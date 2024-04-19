<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model
{
    protected $DBgroup          = 'default';
    protected $table            = 'tprodi';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = [
        "id", "id_jurusan", "kode_program_studi", "nama_program_studi"
    ];


    public function getJurusanProdi()
    {
        return $this->db->table('tprodi')
            ->select('tprodi.*', 'tjurusan.nama_jurusan')
            ->join('tjurusan', 'tjurusan.id=tprodi.id_jurusan')
            ->get()->getResultArray();
    }
}
