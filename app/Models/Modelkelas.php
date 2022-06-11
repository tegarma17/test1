<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkelas extends Model
{
    protected $table      = 'tbkelas';
    protected $primaryKey = 'id_kelas';
    protected $returnType     = 'array';
    protected $allowedFields = ['tingkat_kelas', 'nama_kelas'];

    public function getKelas()
    {
        return $this->findAll();
    }
}
