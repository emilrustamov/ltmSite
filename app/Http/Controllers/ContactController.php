<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForm()
    {
        return view('contact');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);

        try {
            // Сохраняем заявку в БД (письмо отправится автоматически через boot() метод)
            Contact::create($fields);
            
            return redirect()->back()->with('success', 'Форма отправлена успешно. Мы скоро с Вами свяжемся.');
        } catch (\Exception $e) {
            // Выводим ошибку в логи Laravel
            \Log::error('Ошибка сохранения контакта: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при отправке формы. Попробуйте позже.');
        }
    }

    // Админ методы
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
