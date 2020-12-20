<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'tb_user';
    protected $allowedFields = ['name_user', 'email_user', 'password_user', 'level_user', 'image_user'];

    public function insertUser($dataInsert)
    {
        $this->db->table($this->table)->insert($dataInsert);
    }
}
