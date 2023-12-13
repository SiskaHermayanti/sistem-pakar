<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenyakitModel;

class Penyakit extends BaseController
{
    public function index()
    {
        $penyakitModel = new PenyakitModel();
        $data['penyakit'] = $penyakitModel->findAll();

        return view('penyakit/index', $data);
    }

    public function create_penyakit()
    {
        return view('penyakit/create_penyakit');
    }

    public function store()
    {
        $penyakitModel = new PenyakitModel();

        // Validasi form jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => [
                'rules' => 'required|alpha_numeric|max_length[255]|is_unique[penyakit.kode_penyakit]',
                'errors' => [
                    'required' => 'Kode Penyakit harus diisi.',
                    'alpha_numeric' => 'Kode Penyakit hanya boleh berisi huruf dan angka.',
                    'max_length' => 'Panjang Kode Penyakit tidak boleh lebih dari 255 karakter.',
                    'is_unique' => 'Kode Penyakit sudah ada. Harap pilih kode penyakit yang berbeda.',
                ],
            ],
            'penyakit' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Penyakit harus diisi.',
                    'max_length' => 'Panjang Penyakit tidak boleh lebih dari 255 karakter.',
                ],
            ],
            'deskripsi_penyakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Penyakit harus diisi.',
                ],
            ],
        ]);
    
        if ($validation->withRequest($this->request)->run()) {
            // Data dari form
            $data = [
                'kode_penyakit' => $this->request->getPost('kode_penyakit'),
                'penyakit' => $this->request->getPost('penyakit'),
                'deskripsi_penyakit' => $this->request->getPost('deskripsi_penyakit'),
            ];
    
            // Simpan data ke database
            $penyakitModel->insert($data);
    
            // Redirect atau tampilkan pesan sukses
            return redirect()->to('/penyakit/index')->with('success', 'Penyakit berhasil ditambahkan.');
        } else {
            // Tampilkan pesan error validasi
            return redirect()->to('/penyakit/create_penyakit')->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function edit_penyakit($kode_penyakit)
    {
        // Mendapatkan data penyakit berdasarkan kode_penyakit
        $penyakitModel = new PenyakitModel();
        $penyakit = $penyakitModel->find($kode_penyakit);
    
        if (!$penyakit) {
            // Tampilkan pesan atau redirect jika penyakit tidak ditemukan
            return redirect()->to('/penyakit/index')->with('error', 'Penyakit tidak ditemukan.');
        }
    
        // Mengambil data yang diperlukan
        $data = [
            'title' => 'Edit Penyakit',
            'penyakit' => $penyakit,
        ];
    
        return view('penyakit/edit_penyakit', $data);
    }
    
    public function update_penyakit($kode_penyakit)
    {
        // Mendapatkan data penyakit berdasarkan kode_penyakit
        $penyakitModel = new PenyakitModel();
        $penyakit = $penyakitModel->find($kode_penyakit);
    
        if (!$penyakit) {
            // Tampilkan pesan atau redirect jika penyakit tidak ditemukan
            return redirect()->to('/penyakit/index')->with('error', 'Penyakit tidak ditemukan.');
        }
    
        // Validasi form (sesuaikan ini dengan aturan validasi yang diperlukan)
        $validation = \Config\Services::validation();
        $validation->setRules([
            'penyakit' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Penyakit harus diisi.',
                    'max_length' => 'Panjang Penyakit tidak boleh lebih dari 255 karakter.',
                ],
            ],
            'deskripsi_penyakit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Deskripsi Penyakit harus diisi.',
                ],
            ],
        ]);
    
        if ($validation->withRequest($this->request)->run()) {
            // Data dari form
            $data = [
                'penyakit' => $this->request->getPost('penyakit'),
                'deskripsi_penyakit' => $this->request->getPost('deskripsi_penyakit'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
    
            // Update data penyakit ke database
            $penyakitModel->update($kode_penyakit, $data);
    
            // Redirect dengan pesan sukses
            return redirect()->to('/penyakit/index')->with('success', 'Penyakit berhasil diperbarui.');
        } else {
            // Tampilkan pesan error validasi
            return redirect()->to('/penyakit/edit_penyakit/' . $kode_penyakit)->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function hapus_penyakit($kode_penyakit)
    {
        // Mendapatkan data Penyakit berdasarkan kode_penyakit
        $penyakitModel = new PenyakitModel();
        $penyakit = $penyakitModel->find($kode_penyakit);

        if (!$penyakit) {
            // Tampilkan pesan atau redirect jika penyakit tidak ditemukan
            return redirect()->to('/penyakit/index')->with('error', 'Penyakit tidak ditemukan.');
        }

        // Hapus data penyakit dari database
        $penyakitModel->delete($kode_penyakit);

        // Redirect dengan pesan sukses
        return redirect()->to('/penyakit/index')->with('success', 'Penyakit berhasil dihapus.');
    }
    
}
