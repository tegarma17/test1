<?php

namespace App\Controllers;

use App\Models\Modelguru;
use App\Models\Modeladmin;

class Guru extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        // $this->d['admlevel'] = $this->session->get($this->session . 'level');
        $this->guru = new Modelguru();
        $this->user = new Modeladmin();
    }
    public function index()
    {
        $data['guru'] = $this->guru->findAll();
        return view('guru/list', $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view('guru/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'nip' => [
                'rules' => 'required|is_unique[tbguru.nip]',
                'errors' => [
                    'required' => 'NIP Haru Diisi',
                    'is_unique' => 'NIP Telah Terdaftar'
                ]
            ],
            'nama_guru' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Guru Harus Diisi'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir Harus Diisi'
                ]
            ],
            'foto' => [
                'rules' => 'is_image[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'is_image' => 'Foto Harus Berupa Gambar',
                    'max_size' => 'Foto Harus Kecil',
                ]
            ],
        ])) {
            return redirect()->to('/guru/add')->withInput();
        }
        $fileFoto = $this->request->getFile('foto');
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
        }


        $sukses = $this->guru->insert([
            'nip' => $this->request->getVar('nip'),
            'nama_guru' => $this->request->getVar('nama_guru'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFoto
        ]);

        $guruID = $this->guru->insertID();
        $tgl_lahir = $this->request->getPost('tanggal_lahir');
        $data_user = [
            'username' => $this->request->getPost('nip'),
            'nama_user' => $this->request->getPost('nama_guru'),
            'password' => $tgl_lahir,
            'level' => 'guru',
            'konid' => $guruID,
            'aktif' => 'aktif'
        ];
        $sukses1 = $this->user->insert($data_user);
        if ($sukses1) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/guru');
        }
    }
    public function edit($id = null)
    {
        $data['validation'] = \Config\Services::validation();
        $data['guru'] = $this->guru->where('id', $id)->first();
        return view('guru/edit', $data);
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->guru->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/guru');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->guru->delete(['id' => $id]);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/guru');
        }
    }
}
