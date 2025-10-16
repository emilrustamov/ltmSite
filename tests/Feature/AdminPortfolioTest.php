<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Portfolio;
use App\Models\Permission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminPortfolioTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected $adminUser;
    protected $regularUser;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Создаем админа с правами
        $this->adminUser = User::factory()->create();
        $this->adminUser->givePermission('admin.access');
        $this->adminUser->givePermission('portfolio.view');
        $this->adminUser->givePermission('portfolio.create');
        $this->adminUser->givePermission('portfolio.edit');
        $this->adminUser->givePermission('portfolio.delete');
        
        // Создаем обычного пользователя
        $this->regularUser = User::factory()->create();
    }

    /** @test */
    public function admin_can_view_portfolio_list()
    {
        $response = $this->actingAs($this->adminUser)
            ->get('/admin/portfolios');

        $response->assertStatus(200);
        $response->assertViewIs('admin.portfolios.index');
    }

    /** @test */
    public function regular_user_cannot_access_portfolio_list()
    {
        $response = $this->actingAs($this->regularUser)
            ->get('/admin/portfolios');

        $response->assertStatus(403);
    }

    /** @test */
    public function admin_can_create_portfolio()
    {
        $portfolioData = [
            'title_ru' => 'Test Portfolio',
            'title_en' => 'Test Portfolio EN',
            'title_tm' => 'Test Portfolio TM',
            'status' => true,
            'is_main_page' => false,
            'ordering' => 1,
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/portfolios', $portfolioData);

        $response->assertRedirect('/admin/portfolios');
        $this->assertDatabaseHas('portfolio', [
            'status' => true,
            'is_main_page' => false,
            'ordering' => 1,
        ]);
    }

    /** @test */
    public function portfolio_creation_requires_title_ru()
    {
        $portfolioData = [
            'title_en' => 'Test Portfolio EN',
            'status' => true,
        ];

        $response = $this->actingAs($this->adminUser)
            ->post('/admin/portfolios', $portfolioData);

        $response->assertSessionHasErrors(['title_ru']);
    }

    /** @test */
    public function admin_can_edit_portfolio()
    {
        $portfolio = Portfolio::factory()->create();
        
        $updateData = [
            'title_ru' => 'Updated Portfolio',
            'title_en' => 'Updated Portfolio EN',
            'status' => false,
        ];

        $response = $this->actingAs($this->adminUser)
            ->put("/admin/portfolios/{$portfolio->slug}", $updateData);

        $response->assertRedirect('/admin/portfolios');
        
        $portfolio->refresh();
        $this->assertEquals('Updated Portfolio', $portfolio->translation('ru')->title);
        $this->assertFalse($portfolio->status);
    }

    /** @test */
    public function admin_can_delete_portfolio()
    {
        $portfolio = Portfolio::factory()->create();

        $response = $this->actingAs($this->adminUser)
            ->delete("/admin/portfolios/{$portfolio->slug}");

        $response->assertRedirect('/admin/portfolios');
        $this->assertDatabaseMissing('portfolio', ['id' => $portfolio->id]);
    }

    /** @test */
    public function user_without_permission_cannot_create_portfolio()
    {
        $user = User::factory()->create();
        $user->givePermission('portfolio.view'); // Только просмотр

        $portfolioData = [
            'title_ru' => 'Test Portfolio',
            'status' => true,
        ];

        $response = $this->actingAs($user)
            ->post('/admin/portfolios', $portfolioData);

        $response->assertStatus(403);
    }
}
