<?php

namespace App\Controllers;

use App\Models\UserModels;

class User extends BaseController
{
   private $userModels;
   public function __construct()
   {
      $this->userModels = new UserModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman User'
      ];

      return view('user/v_index', $data);
   }

   public function getuser()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'users'     => $this->userModels->findAll()
         ];

         $msg = [
            'data'      => view('user/v_getuser', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $msg = [
            'data'      => view('user/v_insertmodal')
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_user'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'email_user'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],
         'password_user' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ],
         'level_user'    => [
            'label'     => 'Inputan level',
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
                  'name_user'       => $validation->getError('name_user'),
                  'email_user'      => $validation->getError('email_user'),
                  'password_user'   => $validation->getError('password_user'),
                  'level_user'      => $validation->getError('level_user'),
               ]
            ];
         }
      } else {
         $dataInsert = [
            'name_user'       => $this->request->getVar('name_user'),
            'email_user'      => $this->request->getVar('email_user'),
            'password_user'   => password_hash($this->request->getVar('password_user'), PASSWORD_DEFAULT),
            'level_user'      => $this->request->getVar('level_user'),
            'image_user'      => $this->request->getVar('image_user'),
         ];

         $this->userModels->insertData($dataInsert);

         $msg = [
            'success'      => 'User berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      $id = $this->request->getVar('id');
      $data = [
         'userUpdate'      => $this->userModels->getDataById($id)
      ];

      $msg = [
         'data'      => view('user/v_updatemodal', $data)
      ];

      return json_encode($msg);
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'name_user'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'email_user'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],
         'password_user' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ],
         'level_user'    => [
            'label'     => 'Inputan level',
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
                  'name_user'       => $validation->getError('name_user'),
                  'email_user'      => $validation->getError('email_user'),
                  'password_user'   => $validation->getError('password_user'),
                  'level_user'      => $validation->getError('level_user'),
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_user');

         $dataUpdate = [
            'name_user'       => $this->request->getVar('name_user'),
            'email_user'      => $this->request->getVar('email_user'),
            'password_user'   => password_hash($this->request->getVar('password_user'), PASSWORD_DEFAULT),
            'level_user'      => $this->request->getVar('level_user'),
            'image_user'      => $this->request->getVar('image_user'),
         ];

         $this->userModels->updateData($dataUpdate, $id);

         $msg = [
            'success'      => 'User berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->userModels->removeData($id);

         $msg = [
            'success'      => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
