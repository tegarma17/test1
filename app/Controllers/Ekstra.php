<?php

namespace App\Controllers;

use App\Models\Modelekstra;

class Ekstra extends BaseController
{
    function __construct()
    {
        $this->ekstra = new Modelekstra();
    }
    public function index()
    {
        $data['ekstra'] = $this->ekstra->getEkstra();
        return view('ekstra/list', $data);
    }

    public function add()
    {
        return view('ekstra/add');
    }

    public function tambah()
    {
        $data = $this->request->getPost();
        $sukses = $this->ekstra->insert($data);
        if ($sukses) {
            session()->setFlashdata('message', 'Ditambahkan ');
            return redirect()->to('/ekstra');
        }
    }
    public function edit($id = null)
    {
        $data['ekstra'] = $this->ekstra->where('id', $id)->first();
        return view('ekstra/edit', $data);
    }

    public function ubah($id = null)
    {
        $data = $this->request->getPost();
        $sukses = $this->ekstra->update($id, $data);
        if ($sukses) {
            session()->setFlashdata('message', 'Diubah ');
            return redirect()->to('/ekstra');
        }
    }

    public function hapus($id)
    {
        $sukses = $this->ekstra->delete(['id' => $id]);
        // $sukses = $this->ekstra->where('id', $id)->delete();
        if ($sukses) {
            session()->setFlashdata('message', 'Dihapus ');
            return redirect()->to('/ekstra');
        }
    }
}
