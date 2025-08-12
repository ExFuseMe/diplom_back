<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function login(LoginRequest $request,  AuthService $authService)
    {
        $validated = $request->validated();

        $data = $authService->authUser($validated);
        if ($data instanceof User){
            return redirect()->route('events.index');
        }
        return redirect()->back()->withErrors(['error' => $data->getMessage()]);
    }

    public function login_view()
    {
        return view('welcome');
    }
}
