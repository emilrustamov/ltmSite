<?php

namespace Tests\Feature;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_form_submits_successfully_with_normalized_phone(): void
    {
        $response = $this->withHeader('User-Agent', 'Mozilla/5.0')
            ->post('/contact', $this->validPayload([
                'phone' => '+993 (61) 00-97-92',
            ]));

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('contacts', [
            'email' => 'test@example.com',
            'phone' => '+99361009792',
        ]);
    }

    public function test_contact_form_returns_validation_errors(): void
    {
        $response = $this->from('/ru')
            ->withHeader('User-Agent', 'Mozilla/5.0')
            ->post('/contact', $this->validPayload([
                'email' => 'invalid-email',
            ]));

        $response->assertRedirect('/ru');
        $response->assertSessionHasErrors(['email']);
    }

    public function test_contact_form_blocks_recent_duplicates(): void
    {
        Contact::query()->create([
            'name' => 'User',
            'email' => 'test@example.com',
            'phone' => '+99361009792',
            'subject' => 'Subject',
            'message' => 'Message',
        ]);

        $response = $this->from('/ru')
            ->withHeader('User-Agent', 'Mozilla/5.0')
            ->post('/contact', $this->validPayload([
                'phone' => '+993 61 00 97 92',
            ]));

        $response->assertRedirect('/ru');
        $response->assertSessionHas('error');
        $this->assertSame(1, Contact::query()->count());
    }

    public function test_contact_form_rejects_honeypot_submission(): void
    {
        $response = $this->withHeader('User-Agent', 'Mozilla/5.0')
            ->post('/contact', $this->validPayload([
                'website' => 'spam',
            ]));

        $response->assertForbidden();
    }

    public function test_contact_form_is_throttled(): void
    {
        for ($i = 0; $i < 3; $i++) {
            $response = $this->withHeader('User-Agent', 'Mozilla/5.0')
                ->post('/contact', $this->validPayload([
                    'email' => "user{$i}@example.com",
                    'phone' => "+9936100979{$i}",
                ]));

            $response->assertRedirect();
        }

        $throttledResponse = $this->withHeader('User-Agent', 'Mozilla/5.0')
            ->post('/contact', $this->validPayload([
                'email' => 'user4@example.com',
                'phone' => '+99361009794',
            ]));

        $throttledResponse->assertStatus(429);
    }

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '99361009792',
            'preferred_contact' => ['phone', 'email'],
            'subject' => 'Test subject',
            'message' => 'Test message',
            'form_started_at' => time() - 10,
            'website' => '',
            'recaptcha_token' => '',
        ], $overrides);
    }
}
