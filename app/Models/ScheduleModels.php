<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModels extends Model
{
   protected $table = 'tb_schedule';
   protected $primaryKey = 'id_schedule';
   protected $allowedFields = ['id_classroom', 'id_course', 'id_lecturer', 'id_room', 'day_schedule', 'time_schedule', 'quota_schedule', 'id_prody'];

   public function getAllDataByPrody($id_prody)
   {
      return $this->db->table($this->table)
         ->join('tb_course', 'tb_course.id_course = tb_schedule.id_course', 'left')
         ->join('tb_prody', 'tb_prody.id_prody = tb_schedule.id_schedule', 'left')
         ->join('tb_lecturer', 'tb_lecturer.id_lecturer = tb_schedule.id_lecturer', 'left')
         ->join('tb_room', 'tb_room.id_room = tb_schedule.id_room', 'left')
         ->join('tb_classroom', 'tb_classroom.id_classroom = tb_schedule.id_classroom', 'left')
         ->where('tb_schedule.id_prody', $id_prody)
         ->orderBy('day_schedule', 'DESC')
         ->orderBy('time_schedule', 'ASC')
         ->get()->getResultArray();
   }

   public function getDataCourseByIdPrody($id_prody)
   {
      return $this->db->table('tb_course')
         ->where('id_prody', $id_prody)
         ->get()->getResultArray();
   }

   function getDataClassroomByIdPrody($id_prody)
   {
      return $this->db->table('tb_classroom')
         ->where('id_prody', $id_prody)
         ->get()->getResultArray();
   }

   public function insertData($dataInsert)
   {
      $this->db->table($this->table)->insert($dataInsert);
   }

   public function removeData($id_schedule)
   {
      $this->db->table($this->table)->where($this->primaryKey, $id_schedule)->delete();
   }
}
