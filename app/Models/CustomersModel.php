<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model{

    protected $table = 'tbl_customers';
    protected $primaryKey = 'id';
    
    
    protected $allowedFields = ['nama','jk','no_telp','alamat'];
    

    
    protected $validationRules = [
    
        'nama'=> 'required',
        'jk'=>'required',
        'no_telp'=>'required',
        'alamat'=>'required'
    ];
    protected $validationMessages = [

        'nama'=>[
            'required'=>'nama harus diisi'
        ],
        
        'jk'=>[
            'required'=>'jenis kelamin harus diisi'
        ],

        'no_telp'=> [
            'required'=>'nomor telepon harus diisi'
        ],

        'alamat'=> [
            'required'=> 'alamat harus diisi'
        ]
    ];
   

}