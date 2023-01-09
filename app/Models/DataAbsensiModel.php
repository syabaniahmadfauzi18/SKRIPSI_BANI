<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAbsensiModel extends Model
{
    protected $table      = 'tb_absensi';
    protected $allowedFields = ['id', 'id_karyawan', 'office', 'date', 'status'];
    protected $dateFormat = 'date';
    protected $useAutoIncrement = true;
}
