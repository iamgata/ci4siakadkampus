<?php

namespace App\Models;

use CodeIgniter\Model;

class SchoolyearModels extends Model
{
   protected $table = 'tb_schoolyear';
   protected $primaryKey = 'id_schoolyear';
   protected $allowedFields = ['name_schoolyear', 'semester_schoolyear'];

   public function removeActiveYear()
   {
      $this->db->table($this->table)->update([
         'status_schoolyear' =>  0
      ]);
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
