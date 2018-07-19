<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");
if (!isset($_SESSION['pelanggan']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>KingHardware</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body> 


<!-- navbar -->
<nav class="navbar navbar-inverse">
	<a class="navbar-brand" href="home.php">KINGHARDWARE</a>
	<div class="container-fluid">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#target-list">
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
        	<span class="icon-bar"></span>
      </button>
      
      </div>
      	<div class="collapse navbar-collapse" id="target-list">	
		<ul class="nav navbar-nav">
			<li class="active"><a href="home.php"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Home</a></li>
			<li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li><a href="rakitpc.php">Rakit Online</a></li>
			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="processor.php">Processor</a></li>
				<li><a href="vga.php">VGA</a></li>
				<li><a href="ram.php">RAM</a></li> 
				<li><a href="harddisk.php">Harddisk</a></li> 
				<li><a href="mobo.php">Mother Board</a></li> 
				<li><a href="psu.php">Power Supply</a></li> 
			</ul>
		</li> 
		</ul>
		<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Info Lain
			<span class="caret"></span></a>
		<ul class="dropdown-menu">
				<li><a href="carapesan.php">Cara Memesan</a></li>
				<li><a href="aboutus.php">Tentang Kami</a></li>
				<li><a href="artikel.php">Artikel</a></li> 
			</ul>
		</li>
			<?php if (isset($_SESSION["pelanggan"])): ?>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" ><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="profile.php">Ganti Profil</a></li>
			    <li><a href="riwayat.php">Riwayat Belanja</a></li>
			    <li><a href="logout.php">Logout</a></li>
			    <?php else: ?>
			     <li><a href="login.php">Login</a></li>
				<?php endif ?> 
			  </ul>
			</li>
		</ul>
	</div>
</nav>

<section class="riwayat">
	<div class="container">
		<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>Tanggal Pemesanan</th>
					<th>Status Pembayaran</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php
				//mendapatkan id pelanggan yang login dari session
				$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
				$ambil = $koneksi->query("SELECT * FROM tabel_pembelian WHERE id_pelanggan='$id_pelanggan'");
				while($pecah = $ambil->fetch_assoc()){
				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["tanggal_pembelian"] ?></td>
					<td><?php echo $pecah["status_pembayaran"] ?></td>
					<td>Rp. <?php echo number_format($pecah["total_pembelian"])?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
						<a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>"" class="btn btn-success">Pembayaran</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

