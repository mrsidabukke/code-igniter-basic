<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{
    protected $DBgroup          = 'default';
    protected $table            = 'tmahasiswa';
    protected $primaryKey       = 'nim';
    protected $useAutoIncrement = false;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        "nim", "nama", "alamat", "jenkel", "id_jurusan", "kode_prodi"
    ];

    //Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $creatdField = 'created_ad';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
