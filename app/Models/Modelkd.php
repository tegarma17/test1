<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelkd extends Model
{
    protected $table      = 'tbkd';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['tahun_ajaran', 'id_guru', 'id_mapel', 'kode_kd', 'nama_kd', 'jenis'];
}
