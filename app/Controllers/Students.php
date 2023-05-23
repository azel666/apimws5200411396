<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class Students extends ResourceController{

    use ResponseTrait;

    protected $modelName = 'App\Models\StudentsModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->orderBy('id', 'asc')->findAll();

        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->where('id', $id)->find();
        
        if ($data) {
            return $this->respond($data, 200);
        }else {
            return $this->failNotFound('Fail not found');
        }
    }

    public function create()
    {
        $data = $this->request->getPost();

        $save = $this->model-> save($data);

        if(!$save){
            return $this->fail($this->model->errors());
        }

        $response = [
            'status' => '201',
            'errors' => 'null',
            'message' => [
                'success' => 'data added successfully'
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

        if(!$check_data){
            return $this->failNotFound('data not found');
        }

        if(!$save){
            return $this->model->fail($this->model->errors());
        }

        $response = [
            'status' => '201',
            'errors' => null,
            'message' => [
                'success' => 'data updated successfully'
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
                   'success' => 'data deleted successfully'
               ]

               ];
               return $this->respond($response);
       }else{
           return $this->failNotFound('Data not found');
       }
    }

}