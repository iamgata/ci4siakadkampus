<?php

namespace App\Models;

use CodeIgniter\Model;

class CollegerModels extends Model
{
   protected $table = 'tb_colleger';
   protected $primaryKey = 'id_colleger';
   protected $allowedFields = ['id_prody', 'nim_colleger', 'name_colleger', 'email_colleger', 'password_colleger', 'image_colleger'];

   public function getAllData()
   {
      return $this->db->table($this->table)
         ->join('tb_prody', 'tb_prody.id_prody = tb_colleger.id_prody', 'left')
         ->get()->getResultArray();
   }

   public function getDataById($id)
   {
      return $this->db->table($this->table)
         ->where($this->primaryKey, $id)
         ->join('tb_prody', 'tb_prody.id_prody = tb_colleger.id_prody', 'left')
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
