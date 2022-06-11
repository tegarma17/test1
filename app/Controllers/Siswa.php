<?php

namespace App\Controllers;

use App\Models\Modelsiswa;
use App\Models\Modeladmin;

class Siswa extends BaseController
{
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->siswa = new Modelsiswa();
        $this->user = new Modeladmin();
    }
    public function index()
    {
        $data = [
            'siswa' => $this->siswa->findAll(),
        ];
        return view('siswa/list', $data);
    }

    public function add()
    {
        $data['validation'] = \Config\Services::validation();
        return view('siswa/add', $data);
    }

    public function tambah()
    {
        if (!$this->validate([
            'nisn' => [
                'rules' => 'required|is_unique[tbsiswa.nisn]',
                'errors' => [
                    'required' => 'NISN Haru Diisi',
                    'is_unique' => 'NISN Telah Terdaftar'
                ]
            ],
            'nis' => [
                'rules' => 'required|is_unique[tbsiswa.nis]',
                'errors' => [
                    'required' => 'NIS Haru Diisi',
                    'is_unique' => 'NIS Telah Terdaftar'
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
            return redirect()->to('/siswa/add')->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default.png';
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('img', $namaFoto);
        }
        $data = [
            'nisn' => $this->request->getVar('nisn'),
            'nis' => $this->request->getVar('nis'),
            'nama_siswa' => $this->request->getVar('nama_siswa'),
            'jk' => $this->request->getVar('jk'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'foto' => $namaFoto
        ];
        $sukses = $this->siswa->save($data);

        $siswaID = $this->siswa->insertID();
        $user_siswa = [
            'username' => $this->request->getPost('nis'),
            'nama_user' => $this->request->getPost('nama_siswa'),
            'password' => $this->request->getPost('tanggal_lahir'),
            'level' => 'siswa',
            'konid' => $siswaID,
            'aktif' => 'aktif'
        ];
        $sukses = $this->user->insert($user_siswa);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/siswa');
        }
    }
    public function edit($id = null)
    {
        $data = [
            'siswa' => $this->siswa->where('id_siswa', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('siswa/edit', $data);
    }
    public function update($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->siswa->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/siswa');
        }
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->siswa->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/siswa');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->siswa->delete(['id_siswa' => $id]);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/siswa');
        }
    }
}
