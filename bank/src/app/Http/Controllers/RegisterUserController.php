<?php

namespace App\Http\Controllers;

use App\Services\Users\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Contracts\Foundation\Application;
use Exception;

/**
 * Class RegisterUserController
 * @package App\Http\Controllers
 */
class RegisterUserController
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * RegisterUserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    /**
     * @param Request $request
     * @return Application|JsonResponse|Response
     */
    public function registerUser(Request $request)
    {
        try {
            $this->userService->registerUser($request->all());
        } catch (Exception $exception) {
            return response([
                'message' => 'Creating user failed',
                'error_message' => $exception->getMessage()
            ])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }

        return response(['message' => 'OK'])->setStatusCode(Response::HTTP_CREATED);
    }
}
