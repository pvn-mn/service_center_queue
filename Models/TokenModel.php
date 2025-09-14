<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table      = 'tokens';
    // protected $primaryKey = 'id';

    // protected $useAutoIncrement = true;

    protected $allowedFields = ['token_number', 'status','created_at'];

    protected $useTimestamps = true;
}