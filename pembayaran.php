<?php 
session_start();
$koneksi = new mysqli("localhost","root","","ideshop");

$ambil=$koneksi->query("SELECT * FROM tabel_pembelian WHERE id_pembelian='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Konfirmasi Bukti Pembayaran</title>

    <!-- Template -->
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" />
    <!-- custom CSS here -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Batas Template-->

</head>
<body><br><br>

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
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Ganti Profil</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="riwayat.php">Riwayat Belanja</a></li>
                <?php else: ?>
                 <li><a href="login.php">Login</a></li>
                <?php endif ?> 
              </ul>
            </li>
        </ul>
    </div>
</nav>

<!--konten-->
<section class="konten">
	<div class="container">

<h2>Upload Bukti Pembayaran</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<img src="../ide2/foto_pembayaran/<?php echo $pecah['bukti_bayar'] ?>" width="200">
	</div>
	<div class="form-group">
		<input type="file" class="form-control" name="foto" required="">
	</div>
	<button class="btn btn-primary" name="save">Upload</button>
</form>

<?php
$id_pemesanan_barusan = $_GET['id']
?>

<?php
if (isset($_POST['save']))
{
	$namafoto=$_FILES['foto']['name'];
	$lokasifoto=$_FILES['foto']['tmp_name'];
	// jika foto dirubah
	if (!empty($lokasifoto))
	{
		move_uploaded_file($lokasifoto, "../ide2/foto_pembayaran/$namafoto");

		$koneksi->query("UPDATE tabel_pembelian 
			SET 
			bukti_bayar = '$namafoto',
			status_pembayaran = 'menunggu konfirmasi'
			WHERE 
			id_pembelian='$_GET[id]'");
	}
	else
	{
		move_uploaded_file($lokasifoto, "../ide2/foto_pembayaran/$namafoto");

		$koneksi->query("UPDATE tabel_pembelian 
			SET 
			bukti_bayar = '$namafoto'
			WHERE 
			id_pembelian='$_GET[id]'");
	}

	echo"<script>alert('upload sukses,status menunggu konfirmasi');</script>";
	echo"<script>location='riwayat.php';</script>";
}
?>



		<!-- nota disini copas dari nota yang ada di admin -->


<br>
<<section class="konten">
                      	<div class="container">
                      		
                      		<center><h2>NOTA PEMESANAN</h2></center>
							<?php
								$ambil = $koneksi->query("SELECT * FROM tabel_pembelian JOIN pelanggan 
								ON tabel_pembelian.id_pelanggan=pelanggan.id_pelanggan 
								WHERE tabel_pembelian.id_pembelian='$_GET[id]'");
								$detail = $ambil->fetch_assoc();
							?>
							<?php
							$idpelangganbeli = $detail["id_pelanggan"];
							$idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

							if ($idpelangganbeli!==$idpelangganlogin)
							{
								echo "<script>alert('tidak dapat diakses');</script>";
								echo "<script>location='riwayat.php';</script>";
							}
							?>
							
							<div class="row">
								<div class="col-md-4">
									<h3>PEMESANAN</h3>
									<strong>No. Pemesanan : <?php echo $detail['id_pembelian']?></strong><br>
									tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
									total : Rp. <?php echo number_format($detail['total_pembelian'])?>
								</div>
								<div class="col-md-4">
									<h3>PELANGGAN</h3>
									<strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan']?></strong><br>
									No. Telepon : <?php echo $detail['telepon_pelanggan'];?><br>
									Email : <?php echo $detail['email_pelanggan'];?>
								</div>
								<div class="col-md-4">
									<h3>PENGIRIMAN</h3>
									<strong><?php echo $detail['nama_kota']?></strong><br>
									Ongkos kirim : Rp. <?php echo number_format($detail['tarif'])?><br> 
									alamat : <?php echo $detail['alamat_pelanggan']?>
								</div>
							</div>
							<br>

<table class="table table-bordered">
			<thead>
				<tr>
					<th>no</th>
					<th>nama produk</th>
					<th>harga produk</th>
					<th>jumlah pembelian</th>
					<th>subtotal</th>
				</tr>
			</thead>
					<tbody>
						<?php $nomor=1; ?>
							<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
							<?php while($pecah = $ambil->fetch_assoc()){ ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td><?php echo $pecah['jumlah']; ?></td>
								<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
							</tr>
						<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>
				<div class="row">
								<div class="col-md-7"></div>
								<div class="alert alert-info">
									<p> 
										Silakan lakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']);?> ke <br>
										<strong>BANK MANDIRI 137-001088-3276 AN. DENNIS FINALDHI</strong>
									</p>
								</div>
									<a href="home.php" class="btn btn-primary">lanjutkan belanja</a>
									<a href="riwayat.php" class="btn btn-danger">Lihat Riwayat Belanja</a>
								</div>
              </div>
        </section>

</body>
</html>


