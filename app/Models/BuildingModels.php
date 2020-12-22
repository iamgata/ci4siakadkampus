<?php

namespace App\Models;

use CodeIgniter\Model;

class BuildingModels extends Model
{
    protected $table = 'tb_building';
    protected $primaryKey = 'id_building';
    protected $allowedFields = ['name_building', 'acronim_building'];
    protected $useTimestamps = true;

    public function insertData($dataInsert)
    {
        $this->db->table($this->table)->insert($dataInsert);
    }

    public function updateData($dataUpdate, $id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->update($dataUpdate);
    }

    public function removeData($id)
    {
        $this->db->table($this->table)->where($this->primaryKey, $id)->delete();
    }
}
