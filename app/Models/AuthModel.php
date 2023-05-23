<?php

namespace App\Models;

use CodeIgniter\Model;

use Exception;

class AuthModel extends Model{

    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    
    
    protected $allowedFields = ['email','password'];
    

    
    // protected $validationRules = [
    
    //     'email'=> 'required',
    //     'password'=>'required'
    // ];
    // protected $validationMessages = [

    //     'email'=>[
    //         'required'=>'nama harus diisi'
    //     ],
        
    //     'password'=>[
    //         'required'=>'jenis kelamin harus diisi'
    //     ]
    // ];

    public function findUserByEmail($email)
    {
        # code...
        $user = $this->asArray()->where('email', $email)->first();

        if (!$user) {
            
            throw new Exception('tidak ditemukan');
            exit;
        }

        return $user;
    }

}