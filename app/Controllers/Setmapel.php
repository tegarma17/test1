<?php

namespace App\Controllers;

use App\Models\Modelkelas;
use App\Models\Modelmapel;
use App\Models\Modelguru;
use App\Models\Modelsetmapel;


class Setmapel extends BaseController
{
    function __construct()
    {
        $this->guru = new Modelguru();
        $this->kelas = new Modelkelas();
        $this->mapel = new Modelmapel();
        $this->setmapel = new Modelsetmapel();
    }
    public function index()
    {
        $data['setmapel'] = $this->setmapel->getAll()->getResultArray();
        // $data['kelas'] = $this->kelas->findAll();
        // $query = $this->db->query("SELECT * FROM `tbruangkelas` ORDER BY id_kelas ASC");
        // $data['kelas'] = $query->getResult();
        return view('setmapel/list', $data);
    }

    public function add()
    {
        $data = [
            'kelas' => $this->kelas->findAll(),
            'guru' => $this->guru->findAll(),
            'mapel' => $this->mapel->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('setmapel/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'id_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Guru Harus Diisi'
                ]
            ],
            'id_mapel' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Mapel Harus Diisi'
                ]
            ],
            'id_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kelas Harus Diisi'
                ]
            ]
        ])) {
            return redirect()->to('/setmapel/add')->withInput();
        }
        $data = array();
        for ($i = 0; $i < count($this->request->getPost('id_mapel')); $i++) {
            $data[$i] = array(
                'id_guru' => $this->request->getPost('id_guru'),
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_mapel' => $this->request->getPost('id_mapel')[$i]
            );
        }
        $sukses = $this->setmapel->insertBatch($data);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/setmapel');
        }
    }
    public function hapus($id = null)
    {
        $sukses = $this->setmapel->delete($id);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/setmapel');
        }
    }
}
