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

        // Inisialisasi fakta (gejala yang telah diinput)
        $facts = array_keys($gejala);

        // Aturan-aturan forward chaining
        $rules = [
            ['symptoms' => ['G001', 'G003', 'G005', 'G006', 'G007', 'G008'], 'disease' => 'P001'],
            ['symptoms' => ['G002', 'G008', 'G018', 'G022', 'G023'], 'disease' => 'P002'],
            ['symptoms' => ['G002', 'G003', 'G008', 'G017', 'G018', 'G021'], 'disease' => 'P003'],
            ['symptoms' => ['G001', 'G009', 'G010', 'G011', 'G012'], 'disease' => 'P004'],
            ['symptoms' => ['G001', 'G004', 'G013', 'G013', 'G014'], 'disease' => 'P005'],
            ['symptoms' => ['G002', 'G003', 'G015', 'G016', 'G018', 'G019', 'G020'], 'disease' => 'P006'],
            ['symptoms' => ['G001', 'G003', 'G021'], 'disease' => 'P007'],
            // Tambahkan aturan lain sesuai kebutuhan
        ];

        // forward chaining
        $diagnosed_disease = $this->forwardChaining($rules, $facts);

        // Dapatkan nama penyakit dan deskripsi berdasarkan kode penyakit
        $penyakit = $penyakitModel->where('kode_penyakit', $diagnosed_disease)->first();

        // Dapatkan solusi pengobatan
        $solusi = $solusiModel->where('kode_penyakit', $diagnosed_disease)->first();

        // Menyediakan data untuk view hasil diagnosis
        $data['penyakit'] = $penyakit ? $penyakit['penyakit'] : 'Tidak diketahui';
        $data['deskripsi_penyakit'] = $penyakit ? $penyakit['deskripsi_penyakit'] : 'Tidak diketahui';
        $data['solusi'] = $solusi ? $solusi['solusi_pengobatan'] : 'Tidak diketahui';

        // Setelah melakukan diagnosis dan mendapatkan $kode_penyakit
        $data['kode_penyakit'] = $diagnosed_disease;

        // Load view hasil diagnosis
        return view('diagnosis/diagnosis_result', $data);
    }

    private function forwardChaining($rules, $facts)
    {
        $diagnosed_disease = null;

        foreach ($rules as $rule) {
            if (count(array_diff($rule['symptoms'], $facts)) == 0 && !in_array($rule['disease'], $facts)) {
                $facts[] = $rule['disease'];
                $diagnosed_disease = $rule['disease'];
                break;
            }
        }

        return $diagnosed_disease;
    }
}