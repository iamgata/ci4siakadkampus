<?php

namespace App\Controllers;

use App\Models\SchoolyearModels;

class Schoolyear extends BaseController
{
   private $schoolyearModels;

   public function __construct()
   {
      $this->schoolyearModels = new SchoolyearModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Tahun Ajaran'
      ];

      return view('schoolyear/v_index', $data);
   }

   public function getschoolyear()
   {
      $data = [
         'schoolyears'     => $this->schoolyearModels->findAll()
      ];

      $msg = [
         'data'      => view('schoolyear/v_getschoolyear', $data)
      ];

      return json_encode($msg);
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $msg = [
            'data'      => view('schoolyear/v_insertmodal')
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_schoolyear'     => [
            'label'     => 'Inputan tahun',
            'rules'     => 'required|exact_length[9]',
            'errors'    => [
               'required'        => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 9 karakter'
            ]
         ],
         'semester_schoolyear'  => [
            'label'     => 'Inputan semester',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ]
      ]);


      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'name_schoolyear'        => $validation->getError('name_schoolyear'),
                  'semester_schoolyear'     => $validation->getError('semester_schoolyear')
               ]
            ];
         }
      } else {
         $dataInsert = [
            'name_schoolyear'        => $this->request->getVar('name_schoolyear'),
            'semester_schoolyear'    => $this->request->getVar('semester_schoolyear'),
         ];

         $this->schoolyearModels->insertData($dataInsert);

         $msg = [
            'success'      => 'Data berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $data = [
            'schoolyearUpdate'      => $this->schoolyearModels->find($id)
         ];

         $msg = [
            'data'      => view('schoolyear/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->schoolyearModels->removeData($id);

         $msg = [
            'success'      => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_schoolyear'     => [
            'label'     => 'Inputan tahun',
            'rules'     => 'required|exact_length[9]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 9 karakter'
            ]
         ],
         'semester_schoolyear'  => [
            'label'     => 'Inputan semester',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ]
      ]);


      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'name_schoolyear'        => $validation->getError('name_schoolyear'),
                  'semester_schoolyear'     => $validation->getError('semester_schoolyear')
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_schoolyear');
         $dataUpdate = [
            'name_schoolyear'        => $this->request->getVar('name_schoolyear'),
            'semester_schoolyear'    => $this->request->getVar('semester_schoolyear'),
         ];

         $this->schoolyearModels->updateData($dataUpdate, $id);

         $msg = [
            'success'      => 'Data berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }
}
