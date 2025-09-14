<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $role = $arguments[0] ?? null;

        if (! session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if ($role && session()->get('role') !== $role) {
            return redirect()->to('/login')->with('error', 'Unauthorized');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}
