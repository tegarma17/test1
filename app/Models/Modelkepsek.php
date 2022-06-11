<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkepsek extends Model
{
    protected $table      = 'tbkepalasekolah';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = [
        'nip', 'nama_kepsek', 'alamat', 'tahun', 'foto'
    ];

    public function getKepsek()
    {
        return $this->findAll();
    }
}
