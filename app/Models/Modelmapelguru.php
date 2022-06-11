<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelmapelguru extends Model
{
    protected $table      = 'tbmapelguru';
    protected $primaryKey = 'id_guru_mapel';
    protected $returnType     = 'array';
    protected $allowedFields = ['tahun_ajaran', 'id_mapel', 'id_guru', 'id_kelas'];

    public function getMapelguru()
    {
        return $this->findAll();
    }
}
