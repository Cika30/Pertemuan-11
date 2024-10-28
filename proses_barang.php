<?php
include('koneksi.php');
$koneksi = new Database();
$action = $_GET['action'];

if ($action == "add") {
    $koneksi->tambah_data(nama_barang: $_POST['nama_barang'], stok: $_POST['stok'], harga_beli: $_POST['harga_beli'], harga_jual: $_POST['harga_jual']);
    header("location:index.php");
}
else if ($action == "edit") {
    $id_barang = $_GET['id_barang'];
    $koneksi->edit_data($id_barang, $_POST['nama_barang'], $_POST[$stok], $_POST['harga_beli'], $_POST['harga_jual']);
    header("location:index.php");
}
else if ($action == "delete") {
    $id_barang = $_GET['id_barang'];
    $koneksi->delete_data($id_barang);
    header("location:index.php");
}
else if ($action == "search") {
    $id_barang = $_POST['nama_barang'];
    $koneksi->cari_data($nama_barang);
    header("location:cari_data.php"); 
}
?>