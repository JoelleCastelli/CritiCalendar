<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if(Hash::check($request->current_password, Auth::user()->password)) {
            $user = User::find($request->user_id);
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Vos informations ont bien été mises à jour');
        }
        return redirect()->back()->with('error', 'Le mot de passe actuel est incorrect');
    }
}
