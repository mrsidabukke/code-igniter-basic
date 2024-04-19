<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
    protected $DBgroup          = 'default';
    protected $table            = 'tjurusan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "nama_jurusan"
    ];
}
