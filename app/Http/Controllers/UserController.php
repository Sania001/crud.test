<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::getUsers();
        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function save(Request $request)
    {
        $data = $request->all();

        $validatedData = $request->validate([
            'nickname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if (!isset($validatedData->errors)) {

            return User::create([
                'nickname' => $data['nickname'],
                'email' => $data['email'],
                'avatar' => isset($data['avatar']) ? $data['avatar'] : '',
                'tag' => $data['tag'],
                'status' => $data['status'],
                'password' => Hash::make($data['password']),
            ]);

        }

        return false;
    }

    public function change(Request $request, $id)
    {
        $data = $request->all();

        $validatedData = $request->validate([
            'nickname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id]
        ]);

        if (!isset($validatedData->errors)) {
            if ($id) {
                $user = User::where('id', $id);
                if ($user) {
                    $user->update([
                        'nickname' => $data['nickname'],
                        'email' => $data['email'],
                        'avatar' => isset($data['avatar']) ? $data['avatar'] : '',
                        'tag' => $data['tag'],
                        'status' => $data['status']
                    ]);
                }
            }

        }

        return false;
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if ($id) {
            $user = User::where('id', $id);
            if ($user) {
                return view('users.create', ['user' => $user->first()]);
            }
        }
        return redirect('/users');
    }

    public function delete(Request $request, $id)
    {
        if ($id) {
            $user = User::where('id', $id);
            if ($user) {
                $user->delete();
                return response(['message' => 'User has been successfully deleted'], 200);
            }
        }
        return response(['message' => 'Something going wrong, try it again later'], 200);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
