<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;
class AuthService
{

    public function authUser(array $validated)
    {
        if (!Auth::attempt($validated)){
            return new ValidationException("Неверный логин или пароль");
        }
        $user = Auth::user();
        return $user;
    }
}
