<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");


if (!isset($_SESSION['pelanggan']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>KingHardware</title>
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
			<li class="active"><a href="home.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="rakitpc.php">Rakit Online</a></li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>  <!-- pemanggilan nama berdasarkan session -->
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="#">Ganti Profil</a></li>
			    <li><a href="logout.php">Logout</a></li>
			  </ul>
			</li>
		</ul>
	</div>
</nav>


<! -- konten -->
<section class="konten">
	<div class="container">
		<h1>New Product</h1>

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-4 col-sm-12">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" style="height: 200px;">
					<div class="caption">
						<h3><?php echo $perproduk['nama_produk']; ?></h3>
						<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
					</div>
				</div>
			</div>
			<?php } ?>


		</div>
	</div>
</section>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>