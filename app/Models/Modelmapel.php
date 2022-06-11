<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmapel extends Model
{
    protected $table      = 'tbmapel';
    protected $primaryKey = 'id_mapel';
    protected $returnType     = 'array';
    protected $allowedFields = ['nama_mapel'];

    public function getMapel()
    {
        return $this->findAll();
    }
}
