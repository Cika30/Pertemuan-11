<?php

class Database {

    var $host = "localhost";

    var $username = "root";

    var $password = "";

    var $database = "belajar_oop";

    var $koneksi;
 
    function __construct() {

        $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (mysqli_connect_error()) {

            die("Koneksi database gagal: " . mysqli_connect_error());

        }

    }
 
    function tampil_data() {

        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang");

        $hasil = []; 

        while ($row = mysqli_fetch_array($data)) {

            $hasil[] = $row;

        }

        return $hasil;

    }
 
    function tambah_data($nama_barang, $stok, $harga_beli, $harga_jual) {

        mysqli_query($this->koneksi, "INSERT INTO tb_barang (nama_barang, stok, harga_beli, harga_jual) VALUES ('$nama_barang', '$stok', '$harga_beli', '$harga_jual')");

    }
 
    function tampil_edit_data($id_barang) {

        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");

        $hasil = []; 

        while ($d = mysqli_fetch_array($data)) {

            $hasil[] = $d;

        }

        return $hasil;

    }
 
    function edit_data($id_barang, $nama_barang, $stok, $harga_beli, $harga_jual) {

        mysqli_query($this->koneksi, "UPDATE tb_barang SET nama_barang='$nama_barang', stok='$stok', harga_beli='$harga_beli', harga_jual='$harga_jual' WHERE id_barang='$id_barang'");

    }
 
    function delete_data($id_barang) {

        mysqli_query($this->koneksi, "DELETE FROM tb_barang WHERE id_barang='$id_barang'");

    }
 
    function cari_data($nama_barang) {

        $data = mysqli_query($this->koneksi, "SELECT * FROM tb_barang WHERE nama_barang='$nama_barang'");

        $hasil = []; 

        while ($row = mysqli_fetch_array($data)) {

            $hasil[] = $row;

        }

        return $hasil; 

    }

}

?>

 