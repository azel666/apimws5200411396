<?php

namespace App\Controllers;

use App\Models\AuthModel;

use CodeIgniter\API\ResponseTrait;

use App\Helpers\jwt_helper;

class Auth extends BaseController{

    use ResponseTrait; 

    public function index()
    {
        $validation = \Config\Services::validation();

        $rules = [

            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Masukkan Email yang valid'
                ]
                ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong'
                ]
            ]


        ];

        $validation->setRules($rules);

        if(!$validation->withRequest($this->request)->run()){
            return $this->fail($validation->getErrors());
        }


        $this->model = new AuthModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->model->findUserByEmail($email);

        if($data['password'] != md5($password)){
             return $this->fail('Authentication Failed');

        }
        helper('jwt');

        $response = [
            'message' => 'Authentication success',
            'data' => $data,
            'access_token' => createJWT($email) 
        ];

        return $this->respond($response);


    }

}