<?php

namespace App\Controllers;

use App\Models\Modelkepsek;

class Kepsek extends BaseController
{
    public function __construct()
    {
        $this->kepsek = new Modelkepsek();
    }
    public function index()
    {
        $data['kepsek'] = $this->kepsek->getKepsek();
        return view('kepsek/list', $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view('kepsek/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required|is_unique[tbkepalasekolah.nip]',
                'errors' => [
                    'required' => 'NIP Haru Diisi',
                    'is_unique' => 'NIP Telah Terdaftar'
                ]
            ],
            'nama_kepse' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Kepala Sekolah Harus Diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Foto Harus Diisi',
                    'max_size' => 'Foto Maksimal 1 Mb',
                    'is_image' => 'Foto Harus Berupa Gambar',
                    'mime_in' => 'Foto Harus Berupa Gambar'
                ]
            ]
        ])) {
            return redirect()->to('/kepsek/add')->withInput();
        }
        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move('img');
        $namaFoto = $fileFoto->getName();

        $sukses = $this->guru->insert([
            'nip' => $this->request->getVar('nip'),
            'nama_kepsek' => $this->request->getVar('nama_kepsek'),
            'alamat' => $this->request->getVar('alamat'),
            'tahun' => $this->request->getVar('tahun'),
            'foto' => $namaFoto
        ]);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/kepsek');
        }
    }
    public function edit($id = null)
    {
        $data['kepsek'] = $this->kepsek->where('id', $id)->first();
        return view('kepsek/edit', $data);
    }
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->kepsek->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/kepsek');
        }
    }
    public function hapus($id)
    {
        $sukses = $this->kepsek->delete(['id' => $id]);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/kepsek');
        }
    }
}
