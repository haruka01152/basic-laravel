<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.dashboard', compact('users'));
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }
}
