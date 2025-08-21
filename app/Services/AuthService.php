<?php

namespace App\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Nette\Schema\ValidationException;
class AuthService
{

    public function authUser(array $validated): ValidationException|Authenticatable
    {
        if (!Auth::attempt($validated)){
            return new ValidationException("Неверный логин или пароль");
        }
        return Auth::user();
    }
}
