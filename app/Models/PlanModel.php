<?php
namespace App\Models;
use CodeIgniter\Model;

class PlanModel extends Model
{
    protected $table = 'plans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'destination', 'start_date', 'end_date', 'activities'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    
    // Tambah validasi
    protected $validationRules = [
        'user_id' => 'required|numeric',
        'destination' => 'required|min_length[3]',
        'start_date' => 'required|valid_date',
        'end_date' => 'required|valid_date',
        'activities' => 'required'
    ];
}