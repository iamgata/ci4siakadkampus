<?php

namespace App\Models;

use CodeIgniter\Model;

class LecturerModels extends Model
{
   protected $table = 'tb_lecturer';
   protected $primaryKey = 'id_lecturer';
   protected $allowedFields = ['code_lecturer', 'nidn_lecturer', 'name_lecturer', 'email_lecturer', 'password_lecturer', 'image_lecturer'];

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
