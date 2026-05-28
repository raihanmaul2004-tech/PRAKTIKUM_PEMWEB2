<?php
class Produk
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function index()
    {
        $sql = "SELECT * FROM produk ORDER BY id DESC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        return $ps->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM produk WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO produk (kode, nama, kondisi, harga, stok, foto) VALUES (?, ?, ?, ?, ?, ?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([
            $data['kode'],
            $data['nama'],
            $data['kondisi'],
            $data['harga'],
            $data['stok'],
            $data['foto'] ?? null,
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE produk SET kode = ?, nama = ?, kondisi = ?, harga = ?, stok = ?, foto = ? WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([
            $data['kode'],
            $data['nama'],
            $data['kondisi'],
            $data['harga'],
            $data['stok'],
            $data['foto'] ?? null,
            $id,
        ]);
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM produk WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    }
}
?>
