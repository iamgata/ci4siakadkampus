<?php

namespace App\Controllers;

use App\Models\BuildingModels;

class Building extends BaseController
{
    private $buildingModel;

    public function __construct()
    {
        $this->buildingModel = new BuildingModels();
    }

    public function index()
    {
        $data = [
            'title'     => 'Halaman Gedung'
        ];

        return view('building/v_index', $data);
    }

    public function getbuilding()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'buildings'     => $this->buildingModel->findAll()
            ];

            $msg = [
                'data'      => view('building/v_getbuilding', $data)
            ];

            return json_encode($msg);
        }
    }

    public function insertview()
    {
        $msg = [
            'data'      => view('building/v_insertmodal')
        ];

        return json_encode($msg);
    }

    public function insertsave()
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'name_building'     => [
                'label'     => 'Inputan nama',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => '{field} harus diisi'
                ]
            ],
            'acronim_building'  => [
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
                        'name_building'     => $validation->getError('name_building'),
                        'acronim_building'  => $validation->getError('acronim_building')
                    ]
                ];
            }
        } else {
            $dataInsert = [
                'name_building'         => $this->request->getVar('name_building'),
                'acronim_building'      => $this->request->getVar('acronim_building'),
            ];

            $this->buildingModel->insertData($dataInsert);

            $msg = [
                'success'   => 'Data berhasil ditambahkan'
            ];
        }

        return json_encode($msg);
    }

    public function updateview()
    {
        $id = $this->request->getVar('id');

        $data = [
            'buildingUpdate'    => $this->buildingModel->find($id)
        ];

        $msg = [
            'data'      => view('building/v_updatemodal', $data)
        ];

        return json_encode($msg);
    }

    public function updatesave()
    {
        $validation = \Config\Services::validation();

        $validate = $this->validate([
            'name_building'     => [
                'label'     => 'Inputan nama',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => '{field} harus diisi'
                ]
            ],
            'acronim_building'  => [
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
                        'name_building'     => $validation->getError('name_building'),
                        'acronim_building'  => $validation->getError('acronim_building'),
                    ]
                ];
            }
        } else {
            $id = $this->request->getVar('id_building');

            $dataUpdate = [
                'name_building'     => $this->request->getVar('name_building'),
                'acronim_building'  => $this->request->getVar('acronim_building')
            ];

            $this->buildingModel->updateData($dataUpdate, $id);

            $msg = [
                'success'       => 'Data berhasil diupdate'
            ];
        }

        return json_encode($msg);
    }

    public function remove()
    {
        $id = $this->request->getVar('id');

        $this->buildingModel->removeData($id);

        $msg = [
            'success'       => 'Data berhasil dihapus'
        ];

        return json_encode($msg);
    }
}
