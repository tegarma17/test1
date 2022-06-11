<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelekstra extends Model
{
    protected $table      = 'tbekstrakulikuler';
    protected $primaryKey = 'id';
    protected $returnType     = 'array';
    protected $allowedFields = ['nama_ekstra'];

    public function getEkstra()
    {
        return $this->findAll();
    }
}
