<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'tbl_products';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['nama_product','description','price'];

    
    protected $validationRules = [

        'nama_product' => 'required',
        'description' => 'required',
        'price' => 'required'

    ];
    protected $validationMessages = [
        
        'nama_product' => [
            'required' => 'nama produk belum terisi'
        ],
        'description' => [
            'required' => 'deskripsi produk belum terisi'
        ],
        'price' => [
            'required' => 'harga harus diisi'
        ]
    ];


}