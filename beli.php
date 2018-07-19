<?php
session_start();
// mendpatkan id produk dari url
$id_produk = $_GET['id'];

// jk sudah ada produk itu dikeranjang, maka produk itu jumlahnya di +1
if(isset($_SESSION['keranjang'][$id_produk]))
{
	$_SESSION['keranjang'][$id_produk]+=1;
}
// selain itu (belum ada dikeranjang), maka produk itu dia anggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_produk] = 1;
}

// larikan ke halaman keranjang
echo "<script>alert('produk telah masuk kedalam keranjang belanja');</script>";
echo "<script>location='home.php';</script>";