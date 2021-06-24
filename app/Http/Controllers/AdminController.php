<?php

namespace App\Http\Controllers;

use App\Models\Authority;
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

    public function add()
    {
        $authorities = Authority::all();
        return view('admin.add', compact('authorities'));
    }

    public function create(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'authority' => $request->authority,
        ]);
        return view('admin.create');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $authorities = Authority::all();
        $user = User::findOrFail($id);
        return view('admin.edit', compact('authorities', 'user'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        User::where('id', $id)->update(['name' => $request->name, 'email' => $request->email, 'authority' => $request->authority]);
        return view('admin.update');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($request->id);
        return view('admin.delete', compact('user'));
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        User::where('id', $id)->delete();
        return view('index.destroy');
    }
}
