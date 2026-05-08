<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
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

        try {
            $recentDuplicate = Contact::query()
                ->where('email', $fields['email'])
                ->where('phone', $fields['phone'])
                ->where('created_at', '>=', now()->subMinutes(15))
                ->exists();

            if ($recentDuplicate) {
                return redirect()->back()->withInput()->with('error', 'Вы уже отправляли сообщение недавно. Пожалуйста, повторите попытку немного позже.');
            }

            Contact::create($fields);

            return redirect()->back()->with('success', 'Форма отправлена успешно. Мы скоро с Вами свяжемся.');
        } catch (\Exception $e) {
            \Log::error('Ошибка сохранения контакта: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при отправке формы. Попробуйте позже.');
        }
    }

    // Админ методы
    /**
     * Возвращает список контактных заявок для администратора.
     */
    public function index()
    {
        // Проверка разрешения на просмотр контактов
        if (!Auth::user()->hasPermission(Permissions::CONTACTS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра контактов');
        }

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
        // Проверка разрешения на просмотр контактов
        if (!Auth::user()->hasPermission(Permissions::CONTACTS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра контактов');
        }

        return view('admin.contacts.show', [
            'contact' => $contact,
        ]);
    }

    /**
     * Удаляет контактную заявку.
     */
    public function destroy(Contact $contact)
    {
        // Проверка разрешения на редактирование контактов
        if (!Auth::user()->hasPermission(Permissions::CONTACTS_EDIT)) {
            abort(403, 'У вас нет прав для удаления контактов');
        }

        $contact->delete();

        return redirect()->route('admin.contacts.index')
            ->with('success', 'Заявка успешно удалена!');
    }
}
