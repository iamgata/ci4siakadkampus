<?php

namespace App\Controllers;

use App\Models\ClassroomModels;
use App\Models\LecturerModels;
use App\Models\ProdyModels;

class Classroom extends BaseController
{
   private $classroomModels;
   private $prodyModels;
   private $lecturerModels;

   public function __construct()
   {
      $this->classroomModels = new ClassroomModels();
      $this->prodyModels = new ProdyModels();
      $this->lecturerModels = new LecturerModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Kelas'
      ];

      return view('classroom/v_index', $data);
   }

   public function getclassroom()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'classrooms'      => $this->classroomModels->getAllData()
         ];

         $msg = [
            'data'      => view('classroom/v_getclassroom', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'prodies'      => $this->prodyModels->getAllData(),
            'lecturers'    => $this->lecturerModels->findAll()
         ];

         $msg = [
            'data'      => view('classroom/v_insertmodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_classroom'     => [
            'label'     => 'Inputan kelas',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'id_prody'     => [
            'label'     => 'Inputan prodi',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'id_lecturer'     => [
            'label'     => 'Inputan dosen',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'year_classroom'     => [
            'label'     => 'Inputan tahun',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors' =>  [
                  'name_classroom'     => $validation->getError('name_classroom'),
                  'id_prody'           => $validation->getError('id_prody'),
                  'id_lecturer'        => $validation->getError('id_lecturer'),
                  'year_classroom'     => $validation->getError('year_classroom'),
               ]
            ];
         }
      } else {
         $dataInsert = [
            'name_classroom'     => strtoupper($this->request->getVar('name_classroom')),
            'id_prody'           => $this->request->getVar('id_prody'),
            'id_lecturer'        => $this->request->getVar('id_lecturer'),
            'year_classroom'     => $this->request->getVar('year_classroom'),
         ];

         $this->classroomModels->insertData($dataInsert);

         $msg = [
            'success'      => 'Kelas berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $data = [
            'classroom'    => $this->classroomModels->getDataById($id),
            'prodies'      => $this->prodyModels->getAllData(),
            'lecturers'    => $this->lecturerModels->findAll()
         ];

         $msg = [
            'data'      => view('classroom/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_classroom'     => [
            'label'     => 'Inputan kelas',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'id_prody'     => [
            'label'     => 'Inputan prodi',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'id_lecturer'     => [
            'label'     => 'Inputan dosen',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'year_classroom'     => [
            'label'     => 'Inputan tahun',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors' =>  [
                  'name_classroom'     => $validation->getError('name_classroom'),
                  'id_prody'           => $validation->getError('id_prody'),
                  'id_lecturer'        => $validation->getError('id_lecturer'),
                  'year_classroom'     => $validation->getError('year_classroom'),
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_classroom');

         $dataUpdate = [
            'name_classroom'     => strtoupper($this->request->getVar('name_classroom')),
            'id_prody'           => $this->request->getVar('id_prody'),
            'id_lecturer'        => $this->request->getVar('id_lecturer'),
            'year_classroom'     => $this->request->getVar('year_classroom'),
         ];

         $this->classroomModels->updateData($dataUpdate, $id);

         $msg = [
            'success'      => 'Kelas berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->classroomModels->removeData($id);

         $msg = [
            'success'      => 'Kelas berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
