<?php

namespace App\Models;

use CodeIgniter\Model;

class RatesModel extends Model
{
    protected $table      = 'rates';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['season','length','type','price','note'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
 
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}