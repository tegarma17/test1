<?php

namespace App\Controllers;

use App\Models\Modelabsensi;
use App\Models\Modelwalikelas;

class N_absensi extends BaseController
{
    function __construct()
    {
        $this->walikelas = new Modelwalikelas();
        $this->absen = new Modelabsensi();
    }

    public function index($id = null)
    {
        $data =
            [
                'data_siswa' => $this->absen->getSiswa(),
                'absen' => $this->absen->findAll(),
            ];
        return view('n_absensi/list', $data);
    }


    public function tambah()
    {
        $data = array();
        $query = $this->absen->findAll();

        for ($i = 0; $i < count($this->request->getPost('s')); $i++) {
            if (!empty($query)) {
                $data[$i] = array(
                    'id' => $query[$i]['id'],
                    's' => $this->request->getPost('s')[$i],
                    'i' => $this->request->getPost('i')[$i],
                    'a' => $this->request->getPost('a')[$i]
                );
                $sukses = $this->absen->save($data[$i]);
            } else {
                $data[$i] = array(
                    'id_siswa' => $this->request->getPost('id_siswa')[$i],
                    's' => $this->request->getPost('s')[$i],
                    'i' => $this->request->getPost('i')[$i],
                    'a' => $this->request->getPost('a')[$i]
                );


                $sukses = $this->absen->save($data[$i]);
            }
        }
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->back();
        }
    }




    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->absensi->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/n_absensi');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->absen->delete(['id' => $id]);
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/n_absensi');
        }
    }
}
