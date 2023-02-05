<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class AuthController extends Controller
{

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            //'password' => $this->passwordRules(),
        ])->validate();

        $user =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => isset($input['password']) ? Hash::make($input['password']) : Hash::make('12345678'),
        ]);

        $user->assignRole($input['role']);
        return redirect('/dashboard');
    }
}
