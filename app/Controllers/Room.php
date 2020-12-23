<?php

namespace App\Controllers;

use App\Models\BuildingModels;
use App\Models\RoomModels;

class Room extends BaseController
{
    private $roomModels;
    private $buildingModels;

    public function __construct()
    {
        $this->roomModels = new RoomModels();
        $this->buildingModels = new BuildingModels();
    }

    public function index()
    {
        $data = [
            'title'     => 'Halaman Ruangan'
        ];

        return view('room/v_index', $data);
    }

    public function getroom()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'rooms'     => $this->roomModels->getAllData()
            ];

            $msg = [
                'data'      => view('room/v_getroom', $data)
            ];

            return json_encode($msg);
        }
    }

    public function insertview()
    {
        $data = [
            'buildingrooms'     => $this->buildingModels->findAll()
        ];

        $msg = [
            'data'      => view('room/v_insertmodal', $data)
        ];

        return json_encode($msg);
    }

    public function insertsave()
    {
        $validation = \Config\Services::validation();
        $validate = $this->validate([
            'name_room'     => [
                'label'     => 'Inputan nama',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => '{field} harus diisi'
                ]
            ],
            'id_building'  => [
                'label'     => 'Inputan gedung',
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
                        'id_building'     => $validation->getError('id_building'),
                        'name_room'     => $validation->getError('name_room'),
                    ]
                ];
            }
        } else {
            $dataInsert = [
                'id_building'   => $this->request->getVar('id_building'),
                'name_room'     => strtoupper($this->request->getVar('name_room'))
            ];

            $this->roomModels->insertData($dataInsert);

            $msg = [
                'success'       => 'Data berhasil ditambahkan'
            ];
        }

        return json_encode($msg);
    }

    public function updateview()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'roomUpdate'    => $this->roomModels->getDataById($id),
                'buildingroomsUpdate'     => $this->buildingModels->findAll()
            ];

            $msg = [
                'data'      => view('room/v_updatemodal', $data)
            ];

            return json_encode($msg);
        }
    }

    public function updatesave()
    {
        $validation = \Config\Services::validation();
        $validate = $this->validate([
            'name_room'     => [
                'label'     => 'Inputan nama',
                'rules'     => 'required',
                'errors'    => [
                    'required'      => '{field} harus diisi'
                ]
            ],
            'id_building'  => [
                'label'     => 'Inputan gedung',
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
                        'id_building'     => $validation->getError('id_building'),
                        'name_room'     => $validation->getError('name_room'),
                    ]
                ];
            }
        } else {
            $id = $this->request->getVar('id_room');

            $dataUpdate = [
                'id_building'   => $this->request->getVar('id_building'),
                'name_room'     => strtoupper($this->request->getVar('name_room'))
            ];

            $this->roomModels->updateData($dataUpdate, $id);

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

            $this->roomModels->removeData($id);

            $msg = [
                'success'       => 'Data berhasil dihapus'
            ];

            return json_encode($msg);
        }
    }
}
