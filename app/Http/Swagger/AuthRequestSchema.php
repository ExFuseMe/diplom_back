<?php

namespace App\Http\Swagger;

/**
 * @OA\Schema (required={"email", "password"})
 */
class AuthRequestSchema
{
    /**
     * @OA\Property (example="admin@admin.com")
     */
    public string $email;

    /**
     * @OA\Property (example="admin")
     */
    public string $password;
}
