<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;

class Admin extends BaseController
{
    public function index() {
        $gejalaModel = new GejalaModel();
        $data['gejala'] = $gejalaModel->findAll();

        return view('admin/index', $data);
    }

    public function create_gejala()
    {
        return view('admin/create_gejala');
    }

    public function tambahgejala()
    {
        $gejalaModel = new GejalaModel();

    // Validasi form jika diperlukan
    $validation = \Config\Services::validation();
    $validation->setRules([
        'kode_gejala' => [
            'rules' => 'required|alpha_numeric|max_length[255]|is_unique[gejala.kode_gejala]',
            'errors' => [
                'required' => 'Kode Gejala harus diisi.',
                'alpha_numeric' => 'Kode Gejala hanya boleh berisi huruf dan angka.',
                'max_length' => 'Panjang Kode Gejala tidak boleh lebih dari 255 karakter.',
                'is_unique' => 'Kode Gejala sudah ada. Harap pilih kode gejala yang berbeda.',
            ],
        ],
        'gejala' => [
            'rules' => 'required|max_length[255]',
            'errors' => [
                'required' => 'Gejala harus diisi.',
                'max_length' => 'Panjang Gejala tidak boleh lebih dari 255 karakter.',
            ],
        ],
    ]);

    if ($validation->withRequest($this->request)->run()) {
        // Data dari form
        $data = [
            'kode_gejala' => $this->request->getPost('kode_gejala'),
            'gejala' => $this->request->getPost('gejala'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan data ke database
        $gejalaModel->insert($data);

        // Redirect atau tampilkan pesan sukses
        return redirect()->to('/admin/index')->with('success', 'Gejala berhasil ditambahkan.');
    } else {
        // Tampilkan pesan error validasi
        return redirect()->to('/admin/create_gejala')->withInput()->with('errors', $validation->getErrors());
    }
    }

    public function penyakit() {
        return view('admin/penyakit');
    }


    public function edit_gejala($kode_gejala)
    {
        // Mendapatkan data gejala berdasarkan kode_gejala
        $gejalaModel = new GejalaModel();
        $gejala = $gejalaModel->find($kode_gejala);
    
        if (!$gejala) {
            // Tampilkan pesan atau redirect jika gejala tidak ditemukan
            return redirect()->to('/admin/index')->with('error', 'Gejala tidak ditemukan.');
        }
    
        // Mengambil data yang diperlukan
        $data = [
            'title' => 'Edit Gejala',
            'gejala' => $gejala,
        ];
    
        return view('admin/edit_gejala', $data);
    }
    
    public function update_gejala($kode_gejala)
    {
        // Mendapatkan data gejala berdasarkan kode_gejala
        $gejalaModel = new GejalaModel();
        $gejala = $gejalaModel->find($kode_gejala);
    
        if (!$gejala) {
            // Tampilkan pesan atau redirect jika gejala tidak ditemukan
            return redirect()->to('/admin/index')->with('error', 'Gejala tidak ditemukan.');
        }
    
        // Validasi form (sesuaikan ini dengan aturan validasi yang diperlukan)
        $validation = \Config\Services::validation();
        $validation->setRules([
            
            'gejala' => 'required|max_length[255]',
        ]);
    
        if ($validation->withRequest($this->request)->run()) {
            // Data dari form
            $data = [
                
                'gejala' => $this->request->getPost('gejala'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
    
            // Update data gejala ke database
            $gejalaModel->update($kode_gejala, $data);
    
            // Redirect dengan pesan sukses
            return redirect()->to('/admin/index')->with('success', 'Gejala berhasil diperbarui.');
        } else {
            // Tampilkan pesan error validasi
            return redirect()->to('/admin/edit_gejala/' . $kode_gejala)->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function hapus_gejala($kode_gejala)
    {
        // Mendapatkan data gejala berdasarkan kode_gejala
        $gejalaModel = new GejalaModel();
        $gejala = $gejalaModel->find($kode_gejala);

        if (!$gejala) {
            // Tampilkan pesan atau redirect jika gejala tidak ditemukan
            return redirect()->to('/admin/index')->with('error', 'Gejala tidak ditemukan.');
        }

        // Hapus data gejala dari database
        $gejalaModel->delete($kode_gejala);

        // Redirect dengan pesan sukses
        return redirect()->to('/admin/index')->with('success', 'Gejala berhasil dihapus.');
    }

}
