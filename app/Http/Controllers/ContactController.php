<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ANMail;
use App\Http\Controllers\ContactMail;
// use App\Mail\ANMail;
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
            Mail::to('erustamow2@gmail.com')->send(new ANMail($fields));
            return redirect()->back()->with('success', 'Форма отправлена успешно. Мы скоро с Вами свяжемся.');
        } catch (\Exception $e) {
            // Выводим ошибку в логи Laravel
            \Log::error('Ошибка отправки почты: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Ошибка при отправке формы. Попробуйте позже.');
        }
    }
}
