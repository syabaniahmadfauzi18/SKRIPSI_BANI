<?php

namespace App\Models;

use CodeIgniter\Model;

class DataKaryawanModel extends Model
{
    protected $table      = 'tb_data_karyawan';
    protected $allowedFields = ['id', 'name', 'position', 'office', 'start_date', 'salary', 'ttl', 'phone', 'username'];
    protected $dateFormat = 'date';
}
