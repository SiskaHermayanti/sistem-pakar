<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PenyakitModel;
use App\Models\SolusiModel;

class CetakDiagnosis extends Controller
{
    public function print_result($kode_penyakit)
    {
        $penyakitModel = model(PenyakitModel::class);
        $solusiModel = model(SolusiModel::class);

        // Dapatkan nama penyakit berdasarkan kode penyakit
        $penyakit = $penyakitModel->where('kode_penyakit', $kode_penyakit)->first();

        // Dapatkan solusi pengobatan
        $solusi = $solusiModel->where('kode_penyakit', $kode_penyakit)->first();

        // Menyediakan data untuk view hasil diagnosis
        $data['penyakit'] = $penyakit ? $penyakit['penyakit'] : 'Tidak diketahui';
        $data['deskripsi_penyakit'] = $penyakit ? $penyakit['deskripsi_penyakit'] : 'Tidak diketahui';
        $data['solusi'] = $solusi ? $solusi['solusi_pengobatan'] : 'Tidak diketahui';

        // Load view hasil diagnosis (tanpa tampilan)
        $content = view('diagnosis/print_result', $data);

        // Menampilkan halaman cetak
        return $this->response
            ->setStatusCode(200)
            ->setContentType('text/html')
            ->setBody($content);
    }
}
