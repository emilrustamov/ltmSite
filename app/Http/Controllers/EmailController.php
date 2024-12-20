<?php

namespace App\Http\Controllers;

use App\Mail\ANMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class EmailController extends Controller
{
    public function send(Request $request, $lang)
    {
        App::setLocale($lang); // Установка локали
        $fields = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required|string',
            'message' => 'required|string',
            'subject' => 'required|string',
        ]);

        $scs = 'Ваша форма отправлена успешно!';

        try {
            Mail::to('a.ahmedova@arassanusga.com')->send(new ANMail($fields));
        } catch (\Throwable $th) {
            $scs = 'err';
        }
        return redirect('/ru')->with('success', $scs);
    }
}
