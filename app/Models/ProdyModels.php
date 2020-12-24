<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdyModels extends Model
{
    protected $table = 'tb_prody';
    protected $primaryKey = 'id_prody';
    protected $allowedFields = ['id_faculity', 'code_prody', 'name_prody', 'degree_prody'];

    public function getAllData()
    {
        return $this->db->table($this->table)
            ->join('tb_faculity', 'tb_faculity.id_faculity = tb_prody.id_faculity', 'left')
            ->orderBy('name_faculity', 'ASC')
            ->orderBy('name_prody', 'ASC')
            ->get()->getResultArray();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)
            ->join('tb_faculity', 'tb_faculity.id_faculity = tb_prody.id_faculity', 'left')
            ->where($this->primaryKey, $id)
            ->get()->getRowArray();
    }

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
