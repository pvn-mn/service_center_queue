<?php

namespace App\Controllers;
use App\Models\TokenModel;
use CodeIgniter\Controller;

class TokenController extends Controller
{
    // Admin:


    public function admin()
    {
        return view('admin_tokens');
    }


    public function updateStatus()
    {
        $id     = (int) $this->request->getPost('id');
        $status = $this->request->getPost('status');

        $model = new TokenModel();
        $model->update($id, ['status' => $status]);

        return $this->response->setJSON(['ok' => true]);
    }


    // User:

    public function index()
{
    return view('tokens');  
}

    // Create a new token ( 'create()' version before implementing session)
    // public function create()
    // {
    //     $model = new TokenModel();
    //     $id = $model->insert([
    //         'token_number' => 'T'.time(),
    //         'status'       => 'Waiting'
    //     ]);
    //     return $this->response->setJSON($model->find($id));
    // }


    public function create()
    {
        $session = session();
        $model   = new TokenModel();


        if ($session->has('my_token_id')) {
            $token = $model->find($session->get('my_token_id'));
            return $this->response->setJSON($token);
        }


        $id = $model->insert([
            'token_number' => 'T'.time(),
            'status'       => 'Waiting'
        ]);

        $session->set('my_token_id', $id);

        return $this->response->setJSON($model->find($id));
    }


    public function me()
    {
        $session = session();
        $model   = new TokenModel();

        $token = null;
        if ($session->has('my_token_id')) {
            $token = $model->find($session->get('my_token_id'));
        }

        return $this->response->setJSON($token);
    }


    public function getList()
    {
        $model = new TokenModel();
        $tokens = $model->orderBy('id','DESC')->findAll();
        return $this->response->setJSON($tokens);
    }
}

