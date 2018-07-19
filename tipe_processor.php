<?php
$koneksi = new mysqli("localhost","root","","ideshop");
$idproduk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 1 AND id_merek = $idproduk");
$ret_val = '';
while($perproduk = $ambil->fetch_assoc()){
    $ret_val .= "<option value=".$perproduk['id_produk'].">
    ".$perproduk['nama_produk']."
    </option>";
}
echo $ret_val
?>