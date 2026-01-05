<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class UserCreateServices
{
    public function create(array $data):User
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make(Str::random(10)),
                'role' => $data['role'],
            ]);

            Password::sendResetLink(['email' => $user->email]);

            return $user;
        });
    }
}
