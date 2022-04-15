<?php

class Mata_Kuliah_Mahasiswa extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Mata_Kuliah_Mahasiswa_model')->create($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mata_kuliah_mahasiswa');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/mata_kuliah_mahasiswa');
                exit;
            }
        } else {
            $data['judul'] = 'Daftar Mata Kuliah Mahasiswa';
            $data['mhs'] = $this->model('Mata_Kuliah_Mahasiswa_model')->getAll();
            $data['mahasiswa'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $data['mata_kuliah'] = $this->model('Mata_Kuliah_model')->GetAllMataKuliah();
            $this->view('templates/header', $data);
            $this->view('mata-kuliah-mahasiswa/index', $data);
            $this->view('templates/footer');
        }
    }

    public function delete()
    {
        if ($this->model('Mata_Kuliah_Mahasiswa_model')->delete($_POST) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mata_kuliah_mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mata_kuliah_mahasiswa');
            exit;
        }
    }
}
