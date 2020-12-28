<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
   protected $table = 'tb_user';
   protected $primaryKey = 'id_user';
   protected $allowedFields = ['name_user', 'email_user', 'password_user', 'level_user', 'image_user'];

   public function insertData($dataInsert)
   {
      $this->db->table($this->table)->insert($dataInsert);
   }

   public function getDataById($id)
   {
      return $this->db->table($this->table)->where($this->primaryKey, $id)
         ->get()->getRowArray();
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
