<?php

namespace App\Models;

use CodeIgniter\Model;

class FaculityModels extends Model
{
    protected $table = 'tb_faculity';
    protected $primaryKey = 'id_faculity';
    protected $allowedFields = ['name_faculity', 'acronim_faculity'];
    protected $useTimestamps = true;

    public function insertData($dataInsert)
    {
        $this->db->table($this->table)->insert($dataInsert);
    }

    public function updateData($dataUpdate, $id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->update($dataUpdate);
    }

    public function remove($id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->delete();
    }
}
