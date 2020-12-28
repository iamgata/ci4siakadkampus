<?php

namespace App\Models;

use CodeIgniter\Model;

class ClassroomModels extends Model
{
   protected $table = 'tb_classroom';
   protected $primaryKey = 'id_classroom';
   protected $allowedFields = ['name_classroom', 'id_prody', 'id_lecturer', 'year_classroom'];

   public function getAllData()
   {
      return $this->db->table($this->table)
         ->join('tb_prody', 'tb_prody.id_prody = tb_classroom.id_prody', 'left')
         ->join('tb_lecturer', 'tb_lecturer.id_lecturer = tb_classroom.id_lecturer', 'left')
         ->get()->getResultArray();
   }

   public function getDataById($id)
   {
      return $this->db->table($this->table)
         ->where($this->primaryKey, $id)
         ->join('tb_prody', 'tb_prody.id_prody = tb_classroom.id_prody', 'left')
         ->join('tb_lecturer', 'tb_lecturer.id_lecturer = tb_classroom.id_lecturer', 'left')
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
