<?php
class Petshop {
    private $ID;
    private $Nama;
    private $Kategori;
    private $Harga;
    private $Gambar;

    public function __construct($ID, $Nama, $Kategori, $Harga, $Gambar) {
        $this->ID = $ID;
        $this->Nama = $Nama;
        $this->Kategori = $Kategori;
        $this->Harga = $Harga;
        $this->Gambar = $Gambar;
    }

    public function getID() {
        return $this->ID;
    }

    public function getNama() {
        return $this->Nama;
    }

    public function getKategori() {
        return $this->Kategori;
    }

    public function getHarga() {
        return $this->Harga;
    }

    public function getGambar() {
        return $this->Gambar;
    }

    public function setNama($Nama) {
        $this->Nama = $Nama;
    }

    public function setKategori($Kategori) {
        $this->Kategori = $Kategori;
    }

    public function setHarga($Harga) {
        $this->Harga = $Harga;
    }

    public function setGambar($Gambar) {
        $this->Gambar = $Gambar;
    }

    public function Ingfo() {
        echo "ID            : {$this->ID}\n";
        echo "Nama          : {$this->Nama}\n";
        echo "Kategori      : {$this->Kategori}\n";
        echo "Harga         : {$this->Harga}\n";
        echo "Gambar        : {$this->Gambar}\n";
    }
    
    public function __destruct() {
        echo "Produk {$this->Nama} dihapus dari daftar.\n";
    }
}
?>
