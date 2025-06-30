<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\AuthenticationException;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Авторизация",
     *     tags={"Авторизация"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(ref="#/components/schemas/AuthRequestSchema",),
     *           ),
     *     ),
     *     @OA\Response(response="200", description="Login successful", @OA\JsonContent(
     *         @OA\Property (property="token", type="string")
     *     )),
     *     @OA\Response(response="401", description="Invalid credentials")
     * )
     */
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            throw new AuthenticationException('Неверный логин или пароль');
        }
        $user = auth()->user();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json(['token' => $token]);
    }
}
