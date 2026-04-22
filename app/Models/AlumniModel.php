<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table            = 'alumni';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id', 'nim', 'full_name', 'major', 'graduation_year', 
        'status', 'company', 'position', 'bio', 'skills', 
        'linkedin_url', 'portfolio_url', 'avatar'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'user_id'         => 'required|is_natural_no_zero',
        'nim'             => 'required|min_length[5]|max_length[20]|is_unique[alumni.nim,id,{id}]',
        'full_name'       => 'required|min_length[3]|max_length[255]',
        'major'           => 'required|max_length[100]',
        'graduation_year' => 'required|exact_length[4]',
        'status'          => 'required|in_list[employed,unemployed,other]',
        'linkedin_url'    => 'permit_empty|valid_url',
        'portfolio_url'   => 'permit_empty|valid_url',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
