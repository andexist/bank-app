<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends BaseController
{
    /**
     * @return JsonResponse
     */
    public function sayHello(): JsonResponse
    {
        return response()->json('Hello from bank app')->setStatusCode(Response::HTTP_OK);
    }
}
