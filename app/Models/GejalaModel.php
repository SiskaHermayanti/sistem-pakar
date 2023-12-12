<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table            = 'gejala';
    protected $primaryKey       = 'kode_gejala';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_gejala', 'gejala'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_gejala' => 'required|alpha_numeric|max_length[255]|is_unique[gejala.kode_gejala]',
        'gejala' => 'required|max_length[255]',
    ];
    protected $validationMessages   = [
        'kode_gejala' => [
            'required' => 'Kode Gejala harus diisi.',
            'alpha_numeric' => 'Kode Gejala hanya boleh berisi huruf dan angka.',
            'max_length' => 'Panjang Kode Gejala tidak boleh lebih dari 255 karakter.',
            'is_unique' => 'Kode Gejala sudah ada. Harap pilih kode gejala yang berbeda.',
        ],
        'gejala' => [
            'required' => 'Gejala harus diisi.',
            'max_length' => 'Panjang Gejala tidak boleh lebih dari 255 karakter.',
        ],
    ];
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

    // public function getgejala()
    // {
    //     return $this->findAll();
    // }
    
    public function update_gejala($data, $kode_gejala)
    {
        return $this->update($kode_gejala, $data);
    }

    public function hapusGejala($kode_gejala)
    {
        // Hapus data gejala dari database berdasarkan kode_gejala
        return $this->delete($kode_gejala);
    }
}
