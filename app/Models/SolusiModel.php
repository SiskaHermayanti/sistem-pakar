<?php

namespace App\Models;

use CodeIgniter\Model;

class SolusiModel extends Model
{
    protected $table            = 'solusi_pengobatan';
    protected $primaryKey       = 'id_solusi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_solusi', 'kode_penyakit', 'solusi_pengobatan'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'kode_penyakit' => 'required|alpha_numeric|max_length[255]',
        'solusi_pengobatan' => 'required',
    ];
    protected $validationMessages   = [
        'kode_penyakit' => [
            'required' => 'Kode Penyakit harus diisi.',
            'alpha_numeric' => 'Kode Penyakit hanya boleh berisi huruf dan angka.',
            'max_length' => 'Panjang Kode Penyakit tidak boleh lebih dari 255 karakter.',
        ],
        'solusi_pengobatan' => [
            'required' => 'Solusi Pengobatan harus diisi.',
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

    // Definisi relasi ke penyakit
    // public function penyakit()
    // {
    //     return $this->belongsTo('App\Models\PenyakitModel', 'kode_penyakit', 'kode_penyakit');
    // }
    public function update_solusi($id_solusi, $data)
    {
        return $this->update($id_solusi, $data);
    }    

    public function hapusSolusi($id_solusi)
    {
        // Hapus data solusi dari database berdasarkan id_solusi
        return $this->delete($id_solusi);
    }

}
