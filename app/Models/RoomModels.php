<?php

namespace App\Models;

use CodeIgniter\Model;

class RoomModels extends Model
{
    protected $table = 'tb_room';
    protected $primaryKey = 'id_room';
    protected $allowedFields = ['id_building', 'name_room'];
    protected $useTimestamps = 'true';

    public function getAllData()
    {
        return $this->db->table($this->table)
            ->join('tb_building', 'tb_building.id_building = tb_room.id_building', 'left')
            ->orderBy('tb_building.id_building', 'ASC')
            ->orderBy('name_room', 'ASC')
            ->get()->getResultArray();
    }

    public function getDataById($id)
    {
        return $this->db->table($this->table)
            ->join('tb_building', 'tb_building.id_building = tb_room.id_building', 'left')
            ->where('id_room', $id)
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
