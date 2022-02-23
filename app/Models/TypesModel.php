<?php

namespace App\Models;

use CodeIgniter\Model;

class TypesModel extends Model
{
    protected $table      = 'types';
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