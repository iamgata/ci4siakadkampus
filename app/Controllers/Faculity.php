<?php

namespace App\Controllers;

use App\Models\FaculityModels;

class Faculity extends BaseController
{
   private $faculityModels;

   public function __construct()
   {
      $this->faculityModels = new FaculityModels();
   }

   public function index()
   {
      $data = [
         'title'         => 'Halaman Fakultas',
      ];

      return view('faculity/v_index', $data);
   }

   public function getfaculity()
   {
      $data = [
         'faculities'    => $this->faculityModels->findAll()
      ];

      $msg = [
         'data'      => view('faculity/v_getfaculity', $data)
      ];

      return json_encode($msg);
   }

   public function insertview()
   {
      $msg = [
         'data'      => view('faculity/v_insertmodal')
      ];

      return json_encode($msg);
   }

   public function insertsave()
   {
      $validation = \Config\Services::validation();

      $validate = $this->validate([
         'name_faculity'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'acronim_faculity'  => [
            'label'     => 'Inputan akronim',
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
                  'name_faculity'        => $validation->getError('name_faculity'),
                  'acronim_faculity'     => $validation->getError('acronim_faculity')
               ]
            ];
         }
      } else {
         $dataInsert = [
            'name_faculity'        => $this->request->getVar('name_faculity'),
            'acronim_faculity'       => $this->request->getVar('acronim_faculity'),
         ];

         $this->faculityModels->insertData($dataInsert);

         $msg = [
            'success'   => 'Data berhasil ditambahkan'
         ];
      }

      return json_encode($msg);
   }

   public function updateview()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $data = [
            'faculityUpdate'    => $this->faculityModels->find($id)
         ];

         $msg = [
            'data'      => view('faculity/v_updatemodal', $data)
         ];

         return json_encode($msg);
      }
   }

   public function updatesave()
   {
      $validation = \Config\Services::validation();

      $validate = $this->validate([
         'name_faculity'     => [
            'label'     => 'Inputan nama',
            'rules'     => 'required',
            'errors'    => [
               'required'      => '{field} harus diisi'
            ]
         ],
         'acronim_faculity'  => [
            'label'     => 'Inputan akronim',
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
                  'name_faculity'        => $validation->getError('name_faculity'),
                  'acronim_faculity'     => $validation->getError('acronim_faculity')
               ]
            ];
         }
      } else {
         $id = $this->request->getVar('id_faculity');

         $dataUpdate = [
            'name_faculity'        => $this->request->getVar('name_faculity'),
            'acronim_faculity'       => $this->request->getVar('acronim_faculity'),
         ];

         $this->faculityModels->updateData($dataUpdate, $id);

         $msg = [
            'success'   => 'Data berhasil diupdate'
         ];
      }

      return json_encode($msg);
   }

   public function remove()
   {
      if ($this->request->isAJAX()) {
         $id = $this->request->getVar('id');

         $this->faculityModels->removeData($id);

         $msg = [
            'success'   => 'Data berhasil dihapus'
         ];

         return json_encode($msg);
      }
   }
}
