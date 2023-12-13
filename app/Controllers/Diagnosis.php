<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\SolusiModel;

class Diagnosis extends Controller
{
   public function index()
    {
        // Mengambil daftar gejala dari database
        $gejalaModel = new GejalaModel();
        $data['gejala'] = $gejalaModel->findAll();
        return view('diagnosis/diagnosis_form', $data);
    }

    public function diagnose()
    {
        $gejalaModel = new GejalaModel();
        $penyakitModel = new PenyakitModel();
        $solusiModel = new SolusiModel();

        $gejala = $this->request->getPost();

        // Lakukan logika diagnosa
        if (isset($gejala['G001']) && isset($gejala['G003']) && isset($gejala['G005']) && isset($gejala['G006']) && isset($gejala['G007']) && isset($gejala['G008'])) {
            $kode_penyakit = 'P001';
        } elseif (isset($gejala['G002']) && isset($gejala['G008']) && isset($gejala['G018']) && isset($gejala['G022']) && isset($gejala['G023'])) {
            $kode_penyakit = 'P002';
        } elseif (isset($gejala['G002']) && isset($gejala['G003']) && isset($gejala['G008']) && isset($gejala['G017']) && isset($gejala['G018']) && isset($gejala['G021'])) {
            $kode_penyakit = 'P003';
        } elseif (isset($gejala['G001']) && isset($gejala['G009']) && isset($gejala['G010']) && isset($gejala['G011']) && isset($gejala['G012'])) {
            $kode_penyakit = 'P004';
        } elseif (isset($gejala['G001']) && isset($gejala['G004']) && isset($gejala['G013']) && isset($gejala['G013']) && isset($gejala['G014'])) {
            $kode_penyakit = 'P005';
        } elseif (isset($gejala['G002']) && isset($gejala['G003']) && isset($gejala['G015']) && isset($gejala['G016']) && isset($gejala['G018']) && isset($gejala['G019']) && isset($gejala['G020'])) {
            $kode_penyakit = 'P006';
        } elseif (isset($gejala['G001']) && isset($gejala['G003']) && isset($gejala['G021'])) {
            $kode_penyakit = 'P007';
        } else {
            $kode_penyakit = 'Tidak diketahui';
        }

        // Dapatkan nama penyakit dan deskripsi berdasarkan kode penyakit
        $penyakit = $penyakitModel->where('kode_penyakit', $kode_penyakit)->first();

        // Dapatkan solusi pengobatan
        $solusi = $solusiModel->where('kode_penyakit', $kode_penyakit)->first();

        // Menyediakan data untuk view hasil diagnosis
        $data['penyakit'] = $penyakit ? $penyakit['penyakit'] : 'Tidak diketahui';
        $data['deskripsi_penyakit'] = $penyakit ? $penyakit['deskripsi_penyakit'] : 'Tidak diketahui';
        $data['solusi'] = $solusi ? $solusi['solusi_pengobatan'] : 'Tidak diketahui';

        // Setelah melakukan diagnosis dan mendapatkan $kode_penyakit
        $data['kode_penyakit'] = $kode_penyakit;
        
        // Load view hasil diagnosis
        return view('diagnosis/diagnosis_result', $data);
    }
}
