<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table            = 'penyakit';
    protected $primaryKey       = 'kode_penyakit';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_penyakit', 'penyakit', 'deskripsi_penyakit'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      =  [
        'kode_penyakit' => 'required|alpha_numeric|max_length[255]|is_unique[penyakit.kode_penyakit]',
        'penyakit' => 'required|max_length[255]',
        'deskripsi_penyakit' => 'required',
    ];
    protected $validationMessages   = [
        'kode_penyakit' => [
            'required' => 'Kode Penyakit harus diisi.',
            'alpha_numeric' => 'Kode Penyakit hanya boleh berisi huruf dan angka.',
            'max_length' => 'Panjang Kode Penyakit tidak boleh lebih dari 255 karakter.',
            'is_unique' => 'Kode Penyakit sudah ada. Harap pilih kode penyakit yang berbeda.',
        ],
        'penyakit' => [
            'required' => 'Penyakit harus diisi.',
            'max_length' => 'Panjang Penyakit tidak boleh lebih dari 255 karakter.',
        ],
        'deskripsi_penyakit' => [
            'required' => 'Deskripsi Penyakit harus diisi.'
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

    public function update_penyakit($data, $kode_penyakit)
    {
        return $this->update($kode_penyakit, $data);
    }

    public function hapusPenyakit($kode_penyakit)
    {
        // Hapus data penyakit dari database berdasarkan kode_penyakit
        return $this->delete($kode_penyakit);
    }
}
