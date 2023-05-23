<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Customers extends ResourceController{

    use ResponseTrait;

    protected $modelName = 'App\Models\CustomersModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->orderBy('id','asc')->findAll();

        return $this->respond($data, 200);

    }

    public function show($id = null)
    {
        $data = $this->model->where('id', $id)->find();
        
        if ($data) {
            return $this->respond($data, 200);
        }else {
            return $this->failNotFound('Data tidak ada');
        }

    }
    public function create()
    {
        $data = $this->request->getPost();

        $save = $this->model->save($data);

        if(!$save) {
            return $this->fail($this->model->errors());
        }

        $response = [

            'status' => '201',
            'errors' => 'null',
            'message' => [
                'success' => 'Berhasil menambahkan data'
            ]
            ];

            return $this->respond($response);

    }
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;

        $check_data = $this->model->where('id', $id)->find();
        $save = $this->model->save($data);

        if (!$check_data){
            return $this->failNotFound('Data tidak ditemukan');
        }

        if(!$save){
            return $this->model->fail($this->model->errors());
        }

        $response = [
            'status' => '200',
            'errors' => null,
            'message' => [
                'success' => 'Data Berhasil di Update'
            ]

            ];

        return $this->respond($response);


    }

    public function delete($id = null)
    {
        $check_data = $this->model->where('id', $id)->find();

        if($check_data){
            $this->model->delete($id);
            $response = [
                'status' => '200',
                'errors' => null,
                'message' => [
                    'success' => 'Data Berhasil di Delete'
                ]
                ];

                return $this->respond($response);
        }else {
            return $this->failNotFound('Data tidak ditemukan');
        }


    }

    // ...
}