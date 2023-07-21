<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    private UserServices $userService;

    public function __construct(UserServices $userServices)
    {
        $this->userService = $userServices;
    }

    public function login(): Response
    {
        return response()->view('user.login', [
            'title' => 'Login'
        ]);
    }

    public function doLogin(Request $request): Response|RedirectResponse
    {
        $user = $request->input('user');
        $password = $request->input('password');

        // Validate input
        if (empty($user) || empty($password)) {
            return response()->view('user.login', [
                'title' => 'Login',
                'error' => 'User or password is required'
            ]);
        }

        if ($this->userService->login($user, $password)) {
            $request->session()->put('user', $user);
            return redirect('/');
        }

        return response()->view('user.login', [
            'title' => 'Login',
            'error' => 'User or password is wrong'
        ]);
    }

    public function doLogout(Request $request): RedirectResponse
    {
        $request->session()->forget('user');
        return redirect('/');
    }
}
