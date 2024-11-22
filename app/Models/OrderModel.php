<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = [
        'order_number',
        'customer_name',
        'total_amount',
        'created_at',
        'updated_at'
    ]; // Kolom-kolom yang bisa diisi secara massal

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = true; // Aktifkan created_at dan updated_at otomatis
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
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

    // Optional: Fungsi untuk mendapatkan semua order dengan sorting
    public function getAllOrders($sort = 'DESC')
    {
        return $this->orderBy('created_at', $sort)->findAll();
    }

    // Optional: Fungsi untuk mencari order berdasarkan customer_name
    public function searchByCustomer($customerName)
    {
        return $this->like('customer_name', $customerName)->findAll();
    }
}
