<?php

namespace App\Controllers;

use App\Models\Modelkelas;

class Kelas extends BaseController
{
    function __construct()
    {
        $this->kelas = new Modelkelas();
    }
    public function index()
    {
        $data['kelas'] = $this->kelas->findAll();
        return view('kelas/list', $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view('kelas/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'nama_kelas' => [
                'rules' => 'required|is_unique[tbkelas.nama_kelas]',
                'errors' => [
                    'required' => 'Kelas Haru Diisi',
                    'is_unique' => 'Kelas Telah Terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/kelas/add')->withInput();
        }
        $data = $this->request->getPost();
        $sukses = $this->kelas->insert($data);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/kelas');
        }
    }
    public function edit($id = null)
    {
        $data['kelas'] = $this->kelas->where('id_kelas', $id)->first();
        return view('kelas/edit', $data);
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->kelas->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/kelas');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->kelas->delete(['id' => $id]);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/kelas');
        }
    }
}
