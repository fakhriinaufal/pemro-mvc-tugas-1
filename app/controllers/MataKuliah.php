<?php

class MataKuliah extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->model('Mata_Kuliah_model')->create($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/matakuliah');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/matakuliah');
                exit;
            }
        } else {
            $data['judul'] = 'Data Mata Kuliah';
            $data['matkul'] = $this->model('Mata_Kuliah_model')->getAllMataKuliah();

            $this->view('templates/header', $data);
            $this->view('mata_kuliah/index', $data);
            $this->view('templates/footer', $data);
        }
    }

    public function update()
    {
        if ($this->model('Mata_Kuliah_model')->update($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }

    public function detailjson()
    {
        echo json_encode($this->model('Mata_Kuliah_model')->detail($_POST['id']));
    }

    public function hapus($id)
    {
        if ($this->model('Mata_Kuliah_model')->delete($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/matakuliah');
            exit;
        }
    }
}
