<?php
$koneksi = new mysqli("localhost","root","","ideshop");
$idproduk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 1 AND id_produk = $idproduk");
$ret_val = '';
while($perproduk = $ambil->fetch_assoc()){
    $ret_val .= "<input type='text' name='subtotal_tipe' id='subtotal_tipe' class='form-control' value=".$perproduk['harga_produk']." readonly>";
}
echo $ret_val
?>