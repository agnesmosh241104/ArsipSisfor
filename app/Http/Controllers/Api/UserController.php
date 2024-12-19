<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\AHttp\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();
        return $this->sendResponse($users, 'Users retrieved successfully.');
    }
}
