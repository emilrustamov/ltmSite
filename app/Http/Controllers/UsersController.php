<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index($lang)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users.index', [
            'lang' => $lang,
            'users' => $users,
        ]);
    }

    public function create($lang)
    {
        return view('admin.users.create', [
            'lang' => $lang,
        ]);
    }

    public function store(Request $req, $lang)
    {
        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
            'admin' => $req->admin ?? false,
            'email_verified_at' => now(),
        ]);

        return redirect("/{$lang}/admin/users")->with('success', 'Пользователь успешно создан!');
    }

    public function edit($lang, $id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', [
            'lang' => $lang,
            'user' => $user,
        ]);
    }

    public function update(Request $req, $lang, $id)
    {
        $user = User::findOrFail($id);

        $req->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $req->name;
        $user->email = $req->email;
        $user->admin = $req->admin ?? false;

        if ($req->filled('password')) {
            $user->password = Hash::make($req->password);
        }

        $user->save();

        return redirect("/{$lang}/admin/users")->with('success', 'Пользователь успешно обновлен!');
    }

    public function destroy($lang, Request $req)
    {
        $user = User::findOrFail($req->id);
        
        // Защита от удаления собственного аккаунта
        if ($user->id === auth()->id()) {
            return redirect("/{$lang}/admin/users")->with('error', 'Вы не можете удалить собственный аккаунт!');
        }

        $user->delete();

        return redirect("/{$lang}/admin/users")->with('success', 'Пользователь успешно удален!');
    }
}

