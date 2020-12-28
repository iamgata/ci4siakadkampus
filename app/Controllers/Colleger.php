<?php

namespace App\Controllers;

use App\Models\CollegerModels;
use App\Models\ProdyModels;

class Colleger extends BaseController
{
   private $collegerModels;
   private $prodyModels;

   public function __construct()
   {
      $this->collegerModels = new CollegerModels();
      $this->prodyModels = new ProdyModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Mahasiswa'
      ];

      return view('colleger/v_index', $data);
   }

   public function getcolleger()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'collegers'    => $this->collegerModels->getAllData()
         ];

         $msg = [
            'data'      => view('colleger/v_getcolleger', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertview()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'collegerProdies'    => $this->prodyModels->getAllData()
         ];

         $msg = [
            'data'      => view('colleger/v_insertmodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();

      $validate = $this->validate([
         'nim_colleger'     => [
            'label'     => 'Inputan nim',
            'rules'     => 'required|exact_length[6]',
            'errors'    => [
               'required'        => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 6 karakter'
            ]
         ],

         'name_colleger'     => [
            'label'     => 'Inputan nama',
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

         'email_colleger'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],

         'password_colleger' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ]
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'nim_colleger'          => $validation->getError('nim_colleger'),
                  'name_colleger'         => $validation->getError('name_colleger'),
                  'id_prody'              => $validation->getError('id_prody'),
                  'email_colleger'        => $validation->getError('email_colleger'),
                  'password_colleger'     => $validation->getError('password_colleger'),
               ]
            ];
         }
      } else {
         $dataInsert = [
            'id_prody'              => $this->request->getVar('id_prody'),
            'nim_colleger'          => strtoupper($this->request->getVar('nim_colleger')),
            'name_colleger'         => $this->request->getVar('name_colleger'),
            'email_colleger'        => $this->request->getVar('email_colleger'),
            'password_colleger'     => $this->request->getVar('password_colleger'),
            'image_colleger'     => $this->request->getVar('image_colleger'),
         ];

         $this->collegerModels->insertData($dataInsert);

         $msg = [
            'success'      => 'Mahasiswa berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $data = [
            'collegerUpdate'      => $this->collegerModels->getDataById($id),
            'collegerProdies'    => $this->prodyModels->getAllData()
         ];

         $msg = [
            'data'      => view('colleger/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();

      $validate = $this->validate([
         'nim_colleger'     => [
            'label'     => 'Inputan nim',
            'rules'     => 'required|exact_length[6]',
            'errors'    => [
               'required'        => '{field} harus diisi',
               'exact_length'    => '{field} harus berisi 6 karakter'
            ]
         ],

         'name_colleger'     => [
            'label'     => 'Inputan nama',
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

         'email_colleger'    => [
            'label'     => 'Inputan email',
            'rules'     => 'required|valid_email',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'valid_email'   => '{field} harus sudah terdaftar'
            ]
         ],

         'password_colleger' => [
            'label'     => 'Inputan password',
            'rules'     => 'required|min_length[8]|max_length[64]',
            'errors'    => [
               'required'      => '{field} harus diisi',
               'min_length'    => '{field} harus berisi minimal 8 karakter',
               'max_length'    => '{field} harus berisi maksimal 64 karakter'
            ]
         ]
      ]);

      if (!$validate) {
         if ($this->request->isAJAX()) {
            $msg = [
               'errors'    => [
                  'nim_colleger'          => $validation->getError('nim_colleger'),
                  'name_colleger'         => $validation->getError('name_colleger'),
                  'id_prody'              => $validation->getError('id_prody'),
                  'email_colleger'        => $validation->getError('email_colleger'),
                  'password_colleger'     => $validation->getError('password_colleger'),
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_colleger');

         $dataUpdate = [
            'id_prody'              => $this->request->getVar('id_prody'),
            'nim_colleger'          => strtoupper($this->request->getVar('nim_colleger')),
            'name_colleger'         => $this->request->getVar('name_colleger'),
            'email_colleger'        => $this->request->getVar('email_colleger'),
            'password_colleger'     => $this->request->getVar('password_colleger'),
            'image_colleger'        => $this->request->getVar('image_colleger'),
         ];

         $this->collegerModels->updateData($dataUpdate, $id);

         $msg = [
            'success'      => 'Mahasiswa berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->collegerModels->removeData($id);

         $msg = [
            'success'      => 'Mahasiswa berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
