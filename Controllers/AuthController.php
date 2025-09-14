<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class AuthController extends Controller
{

    public function loginForm()
    {
        return view('login');
    }


    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');


        $users = [
            'user'  => ['pass' => 'user123',  'role' => 'user'],
            'admin' => ['pass' => 'admin123', 'role' => 'admin'],
        ];

        if (isset($users[$username]) && $users[$username]['pass'] === $password) {
            session()->set([
                'logged_in' => true,
                'username'  => $username,
                'role'      => $users[$username]['role'],
            ]);
            return redirect()->to($users[$username]['role'] === 'admin' ? '/token/admin' : '/tokens');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
