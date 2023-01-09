<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'tb_setting';
    protected $allowedFields = ['id', 'scanner_link', 'latitude', 'longitude'];
}
