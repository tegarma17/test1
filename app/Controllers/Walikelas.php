<?php

namespace App\Controllers;

use App\Models\Modelkelas;
use App\Models\Modelguru;
use App\Models\Modelsiswa;
use App\Models\Modelwalikelas;


class Walikelas extends BaseController
{
    protected $walikelas;
    function __construct()
    {
        $this->kelas = new Modelkelas();
        $this->guru = new Modelguru();
        $this->siswa = new Modelsiswa();
        $this->walikelas = new Modelwalikelas();
    }
    public function index()
    {
        $data['walikelas'] = $this->walikelas->getAll();
        return view('walikelas/list', $data);
    }
    public function add()
    {
        $data = [
            'guru' => $this->guru->findAll(),
            'kelas' => $this->kelas->findAll(),
            'siswa' => $this->siswa->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('walikelas/add', $data);
    }

    public function tambah()
    {
        $data = array();
        for ($i = 0; $i < count($this->request->getPost('id_siswa')); $i++) {
            $data[$i] = array(
                'id_guru' => $this->request->getPost('id_guru'),
                'id_siswa' => $this->request->getPost('id_siswa')[$i],
                'id_kelas' => $this->request->getPost('id_kelas')
            );
        }
        $sukses = $this->walikelas->insertBatch($data);


        // $p = $this->request->getPost();
        // $teks_val = array();
        // foreach ($p['id_siswa'] as $kelas_siswa) {
        //     $teks_val[] = "('" . $p['id_guru'] . "','" . $p['id_kelas'] . "', '" . $kelas_siswa . "')";
        // }
        // $query = "INSERT IGNORE INTO tbwalikelas (id_guru, id_kelas, id_siswa) VALUES " . implode(", ", $teks_val) . ";";
        // $sukses = $this->db->query($query);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/walikelas');
        } else {
            session()->setFlashdata('message', 'Gagal Ditambahkan ');
            return redirect()->to('/walikelas');
        }
    }
    public function edit($id = null)
    {
        $data = [
            'walikelas' => $this->walikelas->where('id', $id)->first(),
            'guru' => $this->guru->findAll(),
            'kelas' => $this->kelas->findAll(),
            'siswa' => $this->siswa->findAll(),
            'validation ' => \Config\Services::validation()

        ];
        return view('walikelas/edit', $data);
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->walikelas->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/walikelas');
        }
    }

    public function hapus($id = null)
    {
        $sukses = $this->walikelas->delete($id);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/walikelas');
        }
    }
}
