<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function index()
    {
        return view('users.settings');
    }

    function saveSettings(UserRequest $request) {
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->back()->with('success', 'Vos informations ont bien été mises à jour');
    }

    function savePassword(PasswordRequest $request) {
        $user = User::find($request->user_id);
        // PROBLEME : il n'arrive pas à faire matcher l'ancien mot de passe avec le mot de passe actuel
        if (Hash::check($user->password, Hash::make($request->current_password))) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Vos informations ont bien été mises à jour');
        }
        return redirect()->back()->with('error', 'Le mot de passe actuel est incorrect');
    }
}
