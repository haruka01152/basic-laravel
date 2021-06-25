<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        return view('home');
    }

    public function passchange()
    {
        $userName = Auth::user()->name;
        return view('passchange', compact('userName'));
    }

    public function passchange_done(PasswordRequest $request)
    {
        User::where('id', Auth::id())->update(['password' => Hash::make($request->password), 'first_passchange' => 1]);
        return view('passReady');
    }
}
