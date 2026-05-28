<?php
//member1 variable (public, protected, private)
class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan; 
    public $nilai; 

    //member2 konstruktor (wajib  public)
    public function __construct($nama, $nim, $jurusan, $nilai) {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->jurusan = $jurusan;
        $this->nilai = $nilai;
    
    }

    //member3 methon (wajib public)
    //method untuk menampilkam daya mahasiswa
    public function tampilkanData() {
        echo "Nama: " .$this->nama. "<br>";
        echo "NIM: " .$this->nim. "<br>";
        echo "Jurusan: " .$this->jurusan. "<br>";
        echo "Nilai: " .$this->nilai. "<br>";
        echo "Status: " .$this->getHasil(). "<hr>";

    }

    //member4 class method: return value
    public function getHasil()
    {
        if($this->nilai >= 60) return "lulus";
        else return "gagal";
    }
}

//membuat objek dari class Mahasiswa
$mhs1 = new Mahasiswa("Budi", "1234567", "Sistem Informasi", 70);
$mhs2 = new Mahasiswa("Budi", "1234567", "Sistem Informasi", 70);


//memanggil method untuk menampilkan data mahasiswa ke browser
$mhs1->tampilkanData();
$mhs2->tampilkanData();
?>