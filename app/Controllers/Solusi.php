<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SolusiModel;
use App\Models\PenyakitModel;

class Solusi extends BaseController
{
    public function index()
    {
        $solusiModel = new SolusiModel();
        $data['solusi'] = $solusiModel->findAll();

        return view('solusi/index', $data);
    }

    public function create_solusi()
    {
        $penyakitModel = new PenyakitModel();
        $data['daftar_penyakit'] = $penyakitModel->findAll();

        return view('solusi/create_solusi', $data);
    }

    public function store()
    {
        $solusiModel = new SolusiModel();
        $penyakitModel = new PenyakitModel();

        // Validasi form jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => [
                'rules' => 'required|alpha_numeric|max_length[255]',
                'errors' => [
                    'required' => 'Kode Penyakit harus diisi.',
                    'alpha_numeric' => 'Kode Penyakit hanya boleh berisi huruf dan angka.',
                    'max_length' => 'Panjang Kode Penyakit tidak boleh lebih dari 255 karakter.',
                ],
            ],
            'solusi_pengobatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Solusi Pengobatan harus diisi.',
                ],
            ],
        ]);
    
        if ($validation->withRequest($this->request)->run()) {
            // Data dari form
            $data = [
                'kode_penyakit' => $this->request->getPost('kode_penyakit'),
                'solusi_pengobatan' => $this->request->getPost('solusi_pengobatan'),
            ];
    
            // Simpan data ke database
            $solusiModel->insert($data);
    
            // Redirect atau tampilkan pesan sukses
            return redirect()->to('/solusi/index')->with('success', 'Solusi Pengobatan berhasil ditambahkan.');
        } else {
            // Tampilkan pesan error validasi
            $data['daftar_penyakit'] = $penyakitModel->findAll(); // Mendapatkan daftar penyakit
            return view('/solusi/create_solusi', $data)->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function edit_solusi($id_solusi)
    {
        // Mendapatkan data solusi_pengobatan berdasarkan id_solusi
        $solusiModel = new SolusiModel();
        $solusi = $solusiModel->find($id_solusi);

        if (!$solusi) {
            // Tampilkan pesan atau redirect jika solusi_pengobatan tidak ditemukan
            return redirect()->to('/solusi/index')->with('error', 'Solusi Pengobatan tidak ditemukan.');
        }

        // Mendapatkan daftar penyakit (gantilah ini dengan cara Anda mendapatkan daftar penyakit)
        $penyakitModel = new PenyakitModel();
        $data['daftar_penyakit'] = $penyakitModel->findAll();

        // Mengambil data yang diperlukan
        $data['title'] = 'Solusi Pengobatan';
        $data['solusi'] = $solusi;

        return view('solusi/edit_solusi', $data);
    }

    public function update_solusi($id_solusi)
    {
        // Mendapatkan data solusi_pengobatan berdasarkan id_solusi
        $solusiModel = new SolusiModel();
        $solusi = $solusiModel->find($id_solusi);

        if (!$solusi) {
            // Tampilkan pesan atau redirect jika solusi_pengobatan tidak ditemukan
            return redirect()->to('/solusi/index')->with('error', 'Solusi Pengobatan tidak ditemukan.');
        }

        // Validasi form jika diperlukan
        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => [
                'rules' => 'required|alpha_numeric|max_length[255]',
                'errors' => [
                    'required' => 'Kode Penyakit harus diisi.',
                    'alpha_numeric' => 'Kode Penyakit hanya boleh berisi huruf dan angka.',
                    'max_length' => 'Panjang Kode Penyakit tidak boleh lebih dari 255 karakter.',
                ],
            ],
            'solusi_pengobatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Solusi Pengobatan harus diisi.',
                ],
            ],
        ]);

        if ($validation->withRequest($this->request)->run()) {
            // Data dari form
            $data = [
                'kode_penyakit' => $this->request->getPost('kode_penyakit'),
                'solusi_pengobatan' => $this->request->getPost('solusi_pengobatan'),
            ];

            // Update data solusi_pengobatan ke database
            $solusiModel->update_solusi($id_solusi, $data);

            // Redirect dengan pesan sukses
            return redirect()->to('/solusi/index')->with('success', 'Solusi Pengobatan berhasil diperbarui.');
        } else {
            // Tampilkan pesan error validasi
            return redirect()->to('/solusi/edit_solusi/' . $id_solusi)->withInput()->with('errors', $validation->getErrors());
        }
    }

    public function hapus_solusi($id_solusi)
    {
        // Mendapatkan data solusi_pengobatan berdasarkan id_solusi
        $solusiModel = new SolusiModel();
        $solusi = $solusiModel->find($id_solusi);

        if (!$solusi) {
            // Tampilkan pesan atau redirect jika solusi_pengobatan tidak ditemukan
            return redirect()->to('/solusi/index')->with('error', 'Solusi Pengobatan tidak ditemukan.');
        }

        // Hapus data solusi dari database
        $solusiModel->delete($id_solusi);

        // Redirect dengan pesan sukses
        return redirect()->to('/solusi/index')->with('success', 'Solusi Pengobatan berhasil dihapus.');
    }

}