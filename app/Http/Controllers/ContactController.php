<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    private const CONTACT_DUPLICATE_WINDOW_MINUTES = 1;
    private const PREFERRED_CONTACT_LABELS = [
        'phone' => 'Телефон',
        'email' => 'Email',
        'social' => 'Соцсеть',
    ];

    /**
     * Отображает страницу с формой контактов.
     */
    public function showForm()
    {
        return view('contact');
    }

    /**
     * Сохраняет отправленную контактную форму.
     */
    public function submitForm(StoreContactRequest $request)
    {
        $fields = $request->validated();
        $preferredContacts = $fields['preferred_contact'] ?? [];
        $preferredContact = collect($preferredContacts)
            ->map(fn ($item) => self::PREFERRED_CONTACT_LABELS[$item] ?? $item)
            ->implode(', ');
        $fallbackEmail = 'noemail+' . now()->timestamp . '@ltm.local';
        $requestText = trim((string) ($fields['request_text'] ?? ''));
        $messageParts = array_filter([
            $requestText !== '' ? 'Запрос: ' . $requestText : '',
            !empty($fields['phone']) ? 'Телефон: ' . $fields['phone'] : '',
            !empty($fields['email']) ? 'Email: ' . $fields['email'] : '',
            !empty($fields['social_contact']) ? 'Соцсеть: ' . $fields['social_contact'] : '',
            !empty($fields['message']) ? 'Комментарий: ' . trim((string) $fields['message']) : '',
        ]);
        $payload = [
            'name' => $fields['name'] ?? 'Не указано',
            'email' => $fields['email'] ?? $fallbackEmail,
            'phone' => $fields['phone'] ?? null,
            'subject' => ($fields['subject'] ?? '') !== '' ? $fields['subject'] : 'Предпочтительный тип связи: ' . $preferredContact,
            'message' => implode("\n", $messageParts),
        ];

        Log::info('Contact form submit attempt', [
            'route' => $request->path(),
            'ip' => $request->ip(),
            'preferred_contact' => $preferredContacts,
            'has_phone' => !empty($fields['phone']),
            'has_email' => !empty($fields['email']),
            'has_social' => !empty($fields['social_contact']),
            'expects_json' => $request->expectsJson(),
        ]);

        try {
            if ($this->isRecentDuplicate($fields)) {
                Log::warning('Contact form blocked as recent duplicate', [
                    'ip' => $request->ip(),
                    'email' => $fields['email'] ?? null,
                    'phone' => $fields['phone'] ?? null,
                ]);

                return $this->errorResponse(
                    $request,
                    'Вы уже отправляли сообщение недавно. Пожалуйста, повторите попытку немного позже.',
                    422,
                    true
                );
            }

            Contact::create($payload);
            Log::info('Contact form submit success', [
                'ip' => $request->ip(),
                'email' => $payload['email'],
                'phone' => $payload['phone'],
            ]);

            return $this->successResponse($request, 'Форма отправлена успешно. Мы скоро с Вами свяжемся.');
        } catch (\Exception $e) {
            Log::error('Contact form submit exception', [
                'ip' => $request->ip(),
                'message' => $e->getMessage(),
            ]);

            return $this->errorResponse($request, 'Ошибка при отправке формы. Попробуйте позже.', 500);
        }
    }

    /**
     * Возвращает список контактных заявок для администратора.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(20);
        
        return view('admin.contacts.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Возвращает детальную страницу контактной заявки.
     */
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Удаляет контактную заявку.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Заявка успешно удалена!');
    }

    /**
     * @param array<string, mixed> $fields
     * @return bool
     */
    private function isRecentDuplicate(array $fields): bool
    {
        if (empty($fields['email']) && empty($fields['phone'])) {
            return false;
        }

        return Contact::query()
            ->where(function ($query) use ($fields) {
                if (!empty($fields['email'])) {
                    $query->orWhere('email', $fields['email']);
                }
                if (!empty($fields['phone'])) {
                    $query->orWhere('phone', $fields['phone']);
                }
            })
            ->where('created_at', '>=', now()->subMinutes(self::CONTACT_DUPLICATE_WINDOW_MINUTES))
            ->exists();
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function successResponse(StoreContactRequest $request, string $message)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message]);
        }

        return redirect()->back()->with('success', $message);
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    private function errorResponse(StoreContactRequest $request, string $message, int $status, bool $withInput = false)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $message], $status);
        }

        $redirect = redirect()->back();
        if ($withInput) {
            $redirect = $redirect->withInput();
        }

        return $redirect->with('error', $message);
    }
}
