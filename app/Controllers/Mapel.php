<?php

namespace App\Controllers;

use App\Models\Modelmapel;

class Mapel extends BaseController
{
    function __construct()
    {
        $this->mapel = new Modelmapel();
    }
    public function index()
    {
        $data['mapel'] = $this->mapel->getMapel();

        return view('mapel/list', $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view('mapel/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'nama_mapel' => [
                'rules' => 'required|is_unique[tbmapel.nama_mapel]',
                'errors' => [
                    'required' => 'Mata Pelajaran Harus DI ISI',
                    'is_unique' => 'Mata Pelajaran Sudah ADA'
                ]
            ]
        ])) {
            return redirect()->to('/mapel/add')->withInput();
        }
        $data = $this->request->getPost();
        $sukses = $this->mapel->insert($data);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/mapel');
        }
    }
    public function edit($id = null)
    {
        $data['mapel'] = $this->mapel->where('id_mapel', $id)->first();
        return view('mapel/edit', $data);
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->mapel->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/mapel');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->mapel->delete(['id' => $id]);
        // $sukses = $this->mapel->where('id', $id)->delete();
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/mapel');
        }
    }
}
