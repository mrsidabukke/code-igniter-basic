<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'tbl_user';
    protected $primaryKey = 'username';
    protected $useAutoIncrement = 'false';
    protected $InsertID = '0';
    protected $returnType = 'array';
    protected $protectFields = 'true';
    protected $allowedFields = [
        'username', 'password', 'nama', 'level_id'
    ];

    //Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdFiled = 'created_ad';
    protected $updateField = 'tgl_update';
    protected $deleteField = 'deleted_at';
}
