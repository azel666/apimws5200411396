<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model {

    protected $table = 'tbl_students';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['nim','nama_mhs','jk','tgl_lahir'];

    
    protected $validationRules = [

        'nim' => 'required',
        'nama_mhs' => 'required',
        'jk' => 'required',
        'tgl_lahir' => 'required'

    ];
    protected $validationMessages = [
        'nim' => [

            'required' => 'nim harus diisi'

        ],
        'nama_mhs' => [
            'required' => 'nama harus diisi'
        ],
        'jk' => [
            'required' => 'jenis kelamin harus diisi'
        ],
        'tgl_lahir' => [
            'required' => 'tanggal lahir harus diisi'
        ]
    ];


}