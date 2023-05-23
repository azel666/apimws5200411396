<?php


namespace App\Models;

use CodeIgniter\Model;

class MatkulModel extends Model{

    protected $table = 'tbl_matkul';
    protected $primaryKey = 'id';
    
    
    protected $allowedFields = ['kode_matkul','nama_matkul','dosen_pengampu'];
    

    
    protected $validationRules = [
       
        'kode_matkul' => 'required', 
        'nama_matkul' => 'required',
        'dosen_pengampu' => 'required'
    
    ];
    protected $validationMessages = [

        'kode_matkul' => [
            'required' => 'kode matkul belum terisi'
        ],
        'nama_matkul' => [
            'required' => 'nama matkul belum terisi'
        ],
        'dosen_pengampu' => [
            'required' => 'dosen pengampu belum terisi'
        ]

    ];
    
    




}