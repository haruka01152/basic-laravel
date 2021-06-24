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
        $authorities = Authority::all();

        $users = User::where(function ($query) {
            if ($authority = request('authority')) {
                $query->where('authority', $authority);
            }

            if ($email = request('email')) {
                $query->where('email', 'LIKE', "%{$email}%");
            }
        })->sortable()->paginate(10);

        // 何も入力せず検索したら最初のadminURLにリダイレクト
        if(isset($request['email']) && $request['email'] == '' && $request['authority'] == ''){
            return redirect()->route('admin');
        }

        return view('admin.dashboard', compact('authorities', 'users'));
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
