<?php

namespace App\Controllers;

use App\Models\FaculityModels;
use App\Models\LecturerModels;
use App\Models\ProdyModels;

class Prody extends BaseController
{
   private $prodyModels;
   private $faculityModels;
   private $lecturerModels;

   public function __construct()
   {
      $this->prodyModels = new ProdyModels();
      $this->faculityModels = new FaculityModels();
      $this->lecturerModels = new LecturerModels();
   }

   public function index()
   {
      $data = [
         'title'     => 'Halaman Program Studi'
      ];

      return view('prody/v_index', $data);
   }

   public function getprody()
   {
      if ($this->request->isAJAX()) {
         $data = [
            'prodies'   => $this->prodyModels->getAllData()
         ];

         $msg = [
            'data'      => view('prody/v_getprody', $data)
         ];

         return json_encode($msg);
      }
   }

   public function insertview()
   {
      $data = [
         'faculityprodies' => $this->faculityModels->findAll(),
         'lecturers'       => $this->lecturerModels->findAll()
      ];

      $msg = [
         'data'      => view('prody/v_insertmodal', $data)
      ];

      return json_encode($msg);
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'id_faculity'  => [
            'label'     => 'Inputan fakultas',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'name_prody'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'code_prody'     => [
            'label'     => 'Inputan kode',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'degree_prody'     => [
            'label'     => 'Inputan tingkat',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'head_prody'     => [
            'label'     => 'Inputan ketua prodi',
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
                  'id_faculity'       => $validation->getError('id_faculity'),
                  'name_prody'        => $validation->getError('name_prody'),
                  'code_prody'        => $validation->getError('code_prody'),
                  'degree_prody'      => $validation->getError('degree_prody'),
                  'head_prody'        => $validation->getError('head_prody'),
               ]
            ];
         }
      } else {
         $dataInsert = [
            'id_faculity'       => $this->request->getVar('id_faculity'),
            'name_prody'        => $this->request->getVar('name_prody'),
            'code_prody'        => $this->request->getVar('code_prody'),
            'degree_prody'      => $this->request->getVar('degree_prody'),
            'head_prody'        => $this->request->getVar('head_prody'),
         ];

         $this->prodyModels->insertData($dataInsert);

         $msg = [
            'success'       => 'Data berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->prodyModels->removeData($id);

         $msg = [
            'success'       => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');
         $data = [
            'prodyUpdate'              => $this->prodyModels->getDataById($id),
            'faculityprodiesUpdate'    => $this->faculityModels->findAll(),
            'lecturers'                => $this->lecturerModels->findAll()
         ];

         $msg = [
            'data'  => view('prody/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();
      $validate = $this->validate([
         'id_faculity'  => [
            'label'     => 'Inputan fakultas',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'name_prody'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'code_prody'     => [
            'label'     => 'Inputan kode',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'degree_prody'     => [
            'label'     => 'Inputan tingkat',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'head_prody'     => [
            'label'     => 'Inputan ketua prodi',
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
                  'id_faculity'       => $validation->getError('id_faculity'),
                  'name_prody'        => $validation->getError('name_prody'),
                  'code_prody'        => $validation->getError('code_prody'),
                  'degree_prody'      => $validation->getError('degree_prody'),
                  'head_prody'        => $validation->getError('head_prody'),
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_prody');

         $dataUpdate = [
            'id_faculity'       => $this->request->getVar('id_faculity'),
            'name_prody'        => $this->request->getVar('name_prody'),
            'code_prody'        => $this->request->getVar('code_prody'),
            'degree_prody'      => $this->request->getVar('degree_prody'),
            'head_prody'        => $this->request->getVar('head_prody'),
         ];

         $this->prodyModels->updateData($dataUpdate, $id);

         $msg = [
            'success'       => 'Data berhasil diupdate'
         ];
      }
      return json_encode($msg);
   }
}
