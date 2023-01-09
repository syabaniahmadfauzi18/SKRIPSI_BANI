<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnualLeaveRequestedModel extends Model
{
    protected $table      = 'tb_annual_leave_request';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'requester_id', 'date', 'reason', 'attachment', 'status'];
    protected $dateFormat = 'date';
}
