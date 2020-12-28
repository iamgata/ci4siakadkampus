<?php

namespace App\Controllers;

use App\Models\LecturerModels;

class Lecturer extends BaseController
{
   private $lecturerModels;
   public function __construct()
   {
      $this->lecturerModels = new LecturerModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Dosen'
      ];

      return view('lecturer/v_index', $data);
   }

   public function getlecturer()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'lecturers'    => $this->lecturerModels->findAll()
         ];

         $msg = [
            'data'      => view('lecturer/v_getlecturer', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $msg = [
            'data'      => view('lecturer/v_insertmodal')
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'code_lecturer'     => [
            'label'     => 'Inputan kode',
            'rules'     => 'required|exact_length[6]',
            'errors'    => [
               'required'        => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 6 karakter'
            ]
         ],

         'nidn_lecturer'     => [
            'label'     => 'Inputan nidn',
            'rules'     => 'required|integer|exact_length[6]',
            'errors'    => [
               'required'     => '{field} harus diisi',
               'integer'      => '{field} harus berisi angka',
               'exact_length' => '{field} harus berisi 6 karakter'
            ]
         ],

         'name_lecturer'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'email_lecturer'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],

         'password_lecturer' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'code_lecturer'      => $validation->getError('code_lecturer'),
                  'nidn_lecturer'      => $validation->getError('nidn_lecturer'),
                  'name_lecturer'      => $validation->getError('name_lecturer'),
                  'email_lecturer'     => $validation->getError('email_lecturer'),
                  'password_lecturer'  => $validation->getError('password_lecturer'),
               ]
            ];
         }
      } else {
         $dataInsert = [
            'code_lecturer'      => strtoupper($this->request->getVar('code_lecturer')),
            'nidn_lecturer'      => $this->request->getVar('nidn_lecturer'),
            'name_lecturer'      => $this->request->getVar('name_lecturer'),
            'email_lecturer'     => $this->request->getVar('email_lecturer'),
            'password_lecturer'  => password_hash($this->request->getVar('password_lecturer'), PASSWORD_DEFAULT),
            'image_lecturer'     => $this->request->getVar('image_lecturer'),
         ];

         $this->lecturerModels->insertData($dataInsert);

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
            'lecturerUpdate'     => $this->lecturerModels->find($id)
         ];

         $msg = [
            'data'      => view('lecturer/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'code_lecturer'     => [
            'label'     => 'Inputan kode',
            'rules'     => 'required|exact_length[6]',
            'errors'    => [
               'required'        => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 6 karakter'
            ]
         ],

         'nidn_lecturer'     => [
            'label'     => 'Inputan nidn',
            'rules'     => 'required|integer|exact_length[6]',
            'errors'    => [
               'required'     => '{field} harus diisi',
               'integer'      => '{field} harus berisi angka',
               'exact_length' => '{field} harus berisi 6 karakter'
            ]
         ],

         'name_lecturer'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],

         'email_lecturer'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],

         'password_lecturer' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ],
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'code_lecturer'      => $validation->getError('code_lecturer'),
                  'nidn_lecturer'      => $validation->getError('nidn_lecturer'),
                  'name_lecturer'      => $validation->getError('name_lecturer'),
                  'email_lecturer'     => $validation->getError('email_lecturer'),
                  'password_lecturer'  => $validation->getError('password_lecturer'),
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_lecturer');
         $dataUpdate = [
            'code_lecturer'      => strtoupper($this->request->getVar('code_lecturer')),
            'nidn_lecturer'      => $this->request->getVar('nidn_lecturer'),
            'name_lecturer'      => $this->request->getVar('name_lecturer'),
            'email_lecturer'     => $this->request->getVar('email_lecturer'),
            'password_lecturer'  => password_hash($this->request->getVar('password_lecturer'), PASSWORD_DEFAULT),
            'image_lecturer'     => $this->request->getVar('image_lecturer'),
         ];

         $this->lecturerModels->updateData($dataUpdate, $id);

         $msg = [
            'success'      => 'Data berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->lecturerModels->removeData($id);

         $msg = [
            'success'      => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
