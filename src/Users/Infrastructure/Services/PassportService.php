<?php

declare(strict_types=1);

namespace Src\Users\Infrastructure\Services;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;
use Laravel\Passport\Client as OClient;

final class PassportService
{


    public static function getTokenAndRefreshToken(string $email, string $password): JsonResponse
    {

        $oClient = OClient::where('password_client', 1)->firstOrFail();
        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '*',
        ]);

        return $response->json();
    }

    public static function getTokenAndRefreshTokenByRefreshToken(string $refreshToken): JsonResponse
    {
        $oClient = OClient::where('password_client', 1)->firstOrFail();

        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'client_id' => $oClient->id,
            'client_secret' => $oClient->secret,
            'scope' => '',
        ]);

        return $response->json();
    }
}
