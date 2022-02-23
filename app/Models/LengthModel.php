<?php

namespace App\Models;

use CodeIgniter\Model;

class LengthModel extends Model
{
    protected $table      = 'length';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['name'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
 
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}