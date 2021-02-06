<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Exception;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * @param Request $request
     * @return JsonResponse|Response|object
     */
    public function getToken(Request $request)
    {
        try {
            $token = $this->authService->getApiToken(
                $request->username,
                $request->password
            );
        } catch (Exception $exception) {
            return response()->json(['message' => 'Not Authorized'])
                ->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return response(['message' => 'Success'])
            ->setStatusCode(Response::HTTP_OK)
            ->withHeaders([
                'token' => $token
            ]);
    }
}
