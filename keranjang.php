<?php
session_start();
$koneksi = new mysqli("localhost","root","","ideshop");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Keranjang Belanja</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body> 

<!-- navbar -->
<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="#">KINGHARDWARE</a>
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      </button>
      
      </div>
      	<div class="collapse navbar-collapse" id="target-list">	
		<ul class="nav navbar-nav">
			<li><a href="home.php">Home</a></li>
			<li class="active"><a href="keranjang.php">Keranjang</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="rakitpc.php">Rakit Online</a></li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>  <!-- pemanggilan nama berdasarkan session -->
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="#">Ganti Profil</a></li>
			    <li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>

<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Produk</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>SubTotal</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<!-- memampilkan id produk yang sedang di perulangkan berdasarkan id_produk -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah['harga_produk']*$jumlah
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
			<?php $nomor++; ?>
			<?php endforeach ?>
			</tbody>
		</table>

		<a href="home.php" class="btn btn-danger">Next Shoping</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>



</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
</html>
