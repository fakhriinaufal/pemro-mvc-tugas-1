<?php

class Mata_Kuliah_model
{
    private $table = 'mata_kuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAllMataKuliah()
    {
        $this->db->query('SELECT * FROM mata_kuliah');
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $query = "INSERT INTO mata_kuliah VALUES(
            null, :nama, :deskripsi
            )";
        $this->db->query($query);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("deskripsi", $data['deskripsi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function detail($id)
    {
        $query = "SELECT * FROM mata_kuliah WHERE id = :id";
        $this->db->query($query);

        $this->db->bind("id", $id);

        return $this->db->single();
    }

    public function update($data)
    {
        $query = "UPDATE mata_kuliah SET
                    nama = :nama,
                    deskripsi = :deskripsi
                WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("nama", $data['nama']);
        $this->db->bind("deskripsi", $data['deskripsi']);
        $this->db->bind("id", $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function delete($id)
    {
        $query = "DELETE FROM mata_kuliah WHERE id = :id";
        $this->db->query($query);
        $this->db->bind("id", $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
