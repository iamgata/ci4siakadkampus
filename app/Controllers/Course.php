<?php

namespace App\Controllers;

use App\Models\CourseModels;
use App\Models\ProdyModels;

class Course extends BaseController
{
   private $prodyModels;
   private $courseModels;

   public function __construct()
   {
      $this->prodyModels = new ProdyModels();
      $this->courseModels = new CourseModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Mata Kuliah',
         'prodies'   => $this->prodyModels->getAllData()
      ];

      return view('course/v_index', $data);
   }

   public function getprodycourse()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'prodies'      => $this->prodyModels->getAllData(),
         ];

         $msg = [
            'data'      => view('course/v_getprodycourse', $data)
         ];

         return json_encode($msg);
      }
   }

   public function detailcourse($id)
   {
      $data = [
         'title'     => 'Detail Mata Kuliah',
         'prody'     => $this->prodyModels->getDataById($id),
         'courses'   => $this->courseModels->getDataByIdPrody($id)
      ];

      return view('course/v_detailcourse', $data);
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {

         $data = [
            'idPrody'     => $this->request->getVar('id')
         ];

         $msg = [
            'data'      => view('course/v_insertmodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'code_course'  => [
            'label'     => 'Inputan kode',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'name_course'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'sks_course'     => [
            'label'     => 'Inputan sks',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'category_course'     => [
            'label'     => 'Inputan kategory',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'smt_course'     => [
            'label'     => 'Inputan semester',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'code_course'       => $validation->getError('code_course'),
                  'name_course'       => $validation->getError('name_course'),
                  'sks_course'        => $validation->getError('sks_course'),
                  'category_course'   => $validation->getError('category_course'),
                  'smt_course'        => $validation->getError('smt_course'),
               ]
            ];
         }
      } else {
         $smt = $this->request->getVar('smt_course');

         if ($smt % 2 == 1) {
            $semester = 'Ganjil';
         } else {
            $semester = 'Genap';
         }

         $dataInsert = [
            'code_course'        => $this->request->getVar('code_course'),
            'name_course'        => $this->request->getVar('name_course'),
            'sks_course'         => $this->request->getVar('sks_course'),
            'category_course'    => $this->request->getVar('category_course'),
            'smt_course'         => $smt,
            'semester_course'    => $semester,
            'id_prody'           => $this->request->getVar('id_prody'),
         ];

         $this->courseModels->insertData($dataInsert);

         $msg = [
            'success'      => 'Data berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $idCourse = $this->request->getVar('id_course');

         $data = [
            'id_prody'        => $this->request->getVar('id_prody'),
            'id_course'       => $idCourse,
            'courseUpdate'    => $this->courseModels->getDataByIdCourse($idCourse)
         ];

         $msg = [
            'data'   => view('course/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'code_course'  => [
            'label'     => 'Inputan kode',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'name_course'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'sks_course'     => [
            'label'     => 'Inputan sks',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'category_course'     => [
            'label'     => 'Inputan kategory',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'smt_course'     => [
            'label'     => 'Inputan semester',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'code_course'       => $validation->getError('code_course'),
                  'name_course'       => $validation->getError('name_course'),
                  'sks_course'        => $validation->getError('sks_course'),
                  'category_course'   => $validation->getError('category_course'),
                  'smt_course'        => $validation->getError('smt_course'),
               ]
            ];
         }
      } else {
         $id_course = $this->request->getVar('id_course');
         $smt = $this->request->getVar('smt_course');

         if ($smt % 2 == 1) {
            $semester = 'Ganjil';
         } else {
            $semester = 'Genap';
         }

         $dataUpdate = [
            'code_course'        => $this->request->getVar('code_course'),
            'name_course'        => $this->request->getVar('name_course'),
            'sks_course'         => $this->request->getVar('sks_course'),
            'category_course'    => $this->request->getVar('category_course'),
            'smt_course'         => $smt,
            'semester_course'    => $semester,
            'id_prody'           => $this->request->getVar('id_prody'),
         ];

         $this->courseModels->updateData($dataUpdate, $id_course);

         $msg = [
            'success'      => 'Data berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->courseModels->removeData($id);

         $msg = [
            'success'      => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
