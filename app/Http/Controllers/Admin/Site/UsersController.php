<?php

namespace App\Http\Controllers\Admin\Site;

use App\Models\Site\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use View;

class UsersController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        View::share ('user_active', ' active');
    }

    public function index()
    {
        return view('admin.users.index', [
            'users'   =>  User::all()
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required',
            'avatar'   => 'nullable|image'
        ]);

        $user = User::add($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        return view('admin.users.edit', [
            'user' => User::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'name'  =>  'required',
            'email' =>  [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar'    =>  'nullable|image'
        ]);

        $user->edit($request->all()); //name,email
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->remove();

        return redirect()->route('users.index');
    }
}
