<?php

namespace App\Http\Middleware;

use App\Services\AuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 * Class CheckToken
 * @package App\Http\Middleware
 */
class CheckToken
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * CheckToken constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $existingToken = $this->authService->getApiToken(
            config('auth.api_token.username'),
            config('auth.api_token.password')
        );

        if ($request->header('token') !== $existingToken) {
            return response(['message' => 'Not Authorized'])
                ->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
