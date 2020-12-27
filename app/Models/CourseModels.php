<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModels extends Model
{
   protected $table = 'tb_course';
   protected $primaryKey = 'id_course';
   protected $allowedFields = ['code_course', 'name_course', 'sks_course', 'category_course', 'smt_course', 'semester_course', 'id_prody'];

   public function getDataByIdPrody($id)
   {
      return $this->db->table($this->table)->where('id_prody', $id)
         ->orderBy('code_course', 'name_course')
         ->get()->getResultArray();
   }

   public function getDataByIdCourse($id)
   {
      return $this->db->table($this->table)->where('id_course', $id)
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
