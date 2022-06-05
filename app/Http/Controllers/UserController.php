<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create(Request $request) {
        $repeat_password_correct = $request->repeat_password === $request->password;
        if ( !$repeat_password_correct ) {
            return redirect()->back()->withErrors(['msg' => 'Пароли не совпадают']);
        }

        $validated = $request->validate([
            'nickname' => 'required|unique:users|min:5|max:100',
            'password' => 'required|min:6'
        ]);
        $validated['password'] = Hash::make($request->password);

        $user = User::create($validated);

        if ( $user ) {
            return redirect()->route('login_page');
        }
    }

    public function check(Request $request) {
        $user = User::where('nickname', $request->nickname)->first();

        if ( !$user ) {
            return redirect()->back()->withErrors(['msg' => 'Пользователь с таким никнеймом не найден']);
        }

        $right_password = Hash::check($request->password, $user->password);

        if ( !$right_password ) {
            return redirect()->back()->withErrors(['msg' => 'Неверный пароль']);
        }

        session()->put('session_user_id', $user->id);
        return redirect('/');
    }

    public function logout() {
        if ( session()->has('session_user_id') ) {
            session()->pull('session_user_id');
            return redirect()->route('login_page');
        }
    }

    public function update(Request $request) {
        $uid = session()->get('session_user_id');
        $right_password = Hash::check(
            $request->password,
            User::find($uid)->password
        );

        if ( !$right_password ) {
            return redirect()->back()->withErrors(['msg' => 'Неверный пароль']);
        }

        $user = User::find($uid);

        $validated = $request->validate([
            'nickname' => 'required|unique:users|min:5|max:100'
        ]);

        $user->update($validated);

        return redirect()->back();
    }

    public function change_password(Request $request) {
        $uid = session()->get('session_user_id');
        
        $right_password = Hash::check(
            $request->old_password,
            User::find($uid)->password
        );

        if ( !$right_password ) {
            return redirect()->back()->withErrors(['msg' => 'Неверный пароль']);
        }

        $user = User::find($uid);

        $validated = $request->validate([
            'password' => 'required|min:5|max:100'
        ]);
        $validated['password'] = Hash::make($request->password);

        $user->update($validated);

        return $this->logout();
    }
}
