<?php

class Mata_Kuliah_Mahasiswa_model
{
    private $table = 'mahasiswa_mata_kuliah';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT mhs.nama, GROUP_CONCAT(m.nama) mata_kuliah FROM " . $this->table . " t JOIN mata_kuliah m ON t.id_mata_kuliah = m.id
                                JOIN mahasiswa mhs ON t.id_mahasiswa = mhs.id GROUP BY mhs.id");
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function create($data)
    {
        $query = "INSERT INTO mahasiswa_mata_kuliah VALUES(:id_mahasiswa, :id_mata_kuliah)";
        $this->db->query($query);

        $this->db->bind("id_mahasiswa", $data['id_mahasiswa']);
        $this->db->bind("id_mata_kuliah", $data['id_mata_kuliah']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($data)
    {
        $query = "DELETE FROM mahasiswa_mata_kuliah WHERE id_mahasiswa = :id_mahasiswa AND id_mata_kuliah = :id_mata_kuliah";
        $this->db->query($query);

        $this->db->bind("id_mahasiswa", $data['id_mahasiswa']);
        $this->db->bind("id_mata_kuliah", $data['id_mata_kuliah']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
