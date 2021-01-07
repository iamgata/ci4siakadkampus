<?php

namespace App\Controllers;

use App\Models\LecturerModels;
use App\Models\ProdyModels;
use App\Models\RoomModels;
use App\Models\ScheduleModels;
use App\Models\SchoolyearModels;

class Schedule extends BaseController
{
   private $prodyModels;
   private $schoolyearModels;
   private $scheduleModels;
   private $roomModels;
   private $lecturerModels;

   public function __construct()
   {
      $this->prodyModels = new ProdyModels();
      $this->schoolyearModels = new SchoolyearModels();
      $this->scheduleModels =  new ScheduleModels();
      $this->roomModels = new RoomModels();
      $this->lecturerModels = new LecturerModels();
   }

   public function index()
   {
      $data = [
         'title'        => 'Halaman Jadwal Kuliah',
         'schoolyear'   => $this->schoolyearModels->getSchoolyearActive()
      ];

      return view('schedule/v_index', $data);
   }

   public function getschedule()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'prodies'        => $this->prodyModels->getAllData()
         ];

         $msg = [
            'data'      => view('schedule/v_getschedule', $data)
         ];

         return json_encode($msg);
      }
   }

   public function detailschedule($id)
   {
      $data = [
         'title'     => 'Detail Jadwal Kuliah',
         'prody'     => $this->prodyModels->getDataById($id),
         'schoolyear'   => $this->schoolyearModels->getSchoolyearActive(),
         'schedules'    => $this->scheduleModels->getAllDataByPrody($id)
      ];

      return view('schedule/v_detailschedule', $data);
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $id_prody = $this->request->getVar('id');

         $data = [
            'idPrody'      => $id_prody,
            'courses'      => $this->scheduleModels->getDataCourseByIdPrody($id_prody),
            'rooms'        => $this->roomModels->getAllData(),
            'lecturers'    => $this->lecturerModels->findAll(),
            'classrooms'   => $this->scheduleModels->getDataClassroomByIdPrody($id_prody)
         ];

         $msg = [
            'data'      => view('schedule/v_insertmodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'day_schedule'    => [
            'label'     => 'Inputan hari',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ],

         'time_schedule'      => [
            'label'     => 'Inputan waktu',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi',
            ]
         ],

         'id_course'    => [
            'label'     => 'Inputan matkul',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ],

         'id_lecturer'    => [
            'label'     => 'Inputan dosen',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ],

         'id_classroom'    => [
            'label'     => 'Inputan kelas',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ],

         'id_room'    => [
            'label'     => 'Inputan ruangan',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ],

         'quota_schedule'      => [
            'label'     => 'Inputan kuota',
            'rules'     => 'required',
            'errors'    => [
               'required'     => '{field} harus diisi'
            ]
         ]

      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'day_schedule'    => $validation->getError('day_schedule'),
                  'time_schedule'   => $validation->getError('time_schedule'),
                  'id_course'       => $validation->getError('id_course'),
                  'id_lecturer'     => $validation->getError('id_lecturer'),
                  'id_classroom'    => $validation->getError('id_classroom'),
                  'id_room'         => $validation->getError('id_room'),
                  'quota_schedule'  => $validation->getError('quota_schedule'),
               ]
            ];
         }
      } else {
         $id_prody = $this->request->getVar('id_prody');

         $dataInsert = [
            'day_schedule'       => $this->request->getVar('day_schedule'),
            'time_schedule'      => $this->request->getVar('time_schedule'),
            'id_course'          => $this->request->getVar('id_course'),
            'id_lecturer'        => $this->request->getVar('id_lecturer'),
            'id_classroom'       => $this->request->getVar('id_classroom'),
            'id_room'            => $this->request->getVar('id_room'),
            'quota_schedule'     => $this->request->getVar('quota_schedule'),
            'id_prody'           => $id_prody
         ];

         $this->scheduleModels->insertData($dataInsert);

         $msg = [
            'success'      => 'Jadwal berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id_schedule = $this->request->getVar('id_schedule');

         $this->scheduleModels->removeData($id_schedule);

         $msg = [
            'success'      => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
