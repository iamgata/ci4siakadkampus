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

   public function getCollegerById($idClassroom)
   {
      return $this->db->table('tb_colleger')
         ->where('id_classroom', $idClassroom)
         ->join('tb_prody', 'tb_prody.id_prody = tb_colleger.id_prody', 'left')
         ->get()->getResultArray();
   }

   public function getCollegerNoClass()
   {
      return $this->db->table('tb_colleger')
         ->join('tb_prody', 'tb_prody.id_prody = tb_colleger.id_prody', 'left')
         ->where($this->primaryKey, 0)
         ->get()->getResultArray();
   }

   public function addCollegerInClass($dataUpdate)
   {
      $this->db->table('tb_colleger')->where('id_colleger', $dataUpdate['id_colleger'])->update($dataUpdate);
   }

   public function removeCollegerInClass($dataRemove)
   {
      $this->db->table('tb_colleger')->where('id_colleger', $dataRemove['id_colleger'])->update($dataRemove);
   }

   public function getCountCollegerById($idClassroom)
   {
      return $this->db->table('tb_colleger')->where('id_classroom', $idClassroom)->countAllResults();
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
