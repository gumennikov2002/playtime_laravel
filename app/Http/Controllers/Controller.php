<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\User;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main_page() {
        $data = [];
        if ( session()->has('session_user_id') ) {
            $uid = session()->get('session_user_id');
            $data['user']['nickname'] = User::find($uid)->nickname;
        }
        return view('app', $data);
    }

    public function reg() {
        return view('reg');
    }

    public function login() {
        return view('login');
    }

    public function lk() {
        if ( !session()->has('session_user_id') ) {
            return redirect()->route('login_page');
        }

        $uid = session()->get('session_user_id');
        $data = [
            'user' => User::where('id', $uid)->first()
        ];

        return view('lk', $data);
    }

    public function lk_change_password() {
        if ( !session()->has('session_user_id') ) {
            return redirect()->route('login_page');
        }

        $uid = session()->get('session_user_id');
        $data = [
            'user' => User::where('id', $uid)->first()
        ];

        return view('change_password', $data);
    }
}
