<?php
class Jenis
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function index()
    {
        $sql = "SELECT * FROM jenis ORDER BY id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM jenis WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO jenis (nama) VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$data['nama']]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE jenis SET nama = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$data['nama'], $id]);
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM jenis WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
}
