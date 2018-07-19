<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");

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
				<li><a href="#">Cara Memesan</a></li>
				<li><a href="#">Tentang Kami</a></li>
				<li><a href="#">Artikel</a></li> 
			</ul>
		</li>
			<?php if (isset($_SESSION["pelanggan"])): ?>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="#">Ganti Profil</a></li>
			    <li><a href="logout.php">Logout</a></li>
			    <?php else: ?>
			     <li><a href="login.php">Login</a></li>
				<?php endif ?> 
			  </ul>
			</li>
		</ul>
	</div>
</nav>

						<section class="kontent">
                      	<div class="container">
                      		
                      		
        				        <div class="row">
       					          <div class="col-sm-8">               
        					         <h2 class="mt-4">Detail pembelian</h2>
        					         </div>
        					         </div>

							<?php 
							$ambil = $koneksi->query("SELECT * FROM tabel_pembelian JOIN pelanggan 
								ON tabel_pembelian.id_pelanggan=pelanggan.id_pelanggan
								WHERE tabel_pembelian.id_pembelian='$_GET[id]'");
							$detail = $ambil->fetch_assoc();
							?>
							

							
							<div class="row">
								<div class="col-md-4">
									<h3>pembelian</h3>
									<strong>No. Pembelian : <?php echo $detail['id_pembelian']?></strong><br>
									tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
									total : Rp. <?php echo number_format($detail['total_pembelian'])?>
								
								</div>
								<div class="col-md-4">
									<h3>pelanggan</h3>
									<strong><?php echo $detail['nama_pelanggan']?></strong><br>
									<p>
									<?php echo $detail['telepon_pelanggan'];?><br>
									<?php echo $detail['email_pelanggan'];?>
									</p>
								</div>
								<div class="col-md-4">
									<h3>pengiriman</h3>
									<strong><?php echo $detail['nama_kota']?></strong><br>
									Ongkos kirim : Rp. <?php echo number_format($detail['tarif'])?><br> 
									alamat : <?php echo $detail['alamat_pelanggan']?>
								</div>
							</div>

							<table class="table table-bordered">
								<thread>
									<tr>
										<th>no</th>
										<th>nama produk</th>
										<th>harga</th>
										<th>jumlah</th>
										<th>subtotal</th>
									</tr>
								</thread>
								<tbody>
								<?php $nomor=1;?>
								<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'");?>
									<?php while($pecah=$ambil->fetch_assoc()){?>
									<tr>
										<td><?php echo $nomor;?></td>
										<td><?php echo $pecah['nama'];?></td>
										<td>Rp. <?php echo number_format($pecah['harga']);?></td>
										<td><?php echo $pecah['jumlah'];?></td>
										<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
									</tr>
									<?php $nomor++;?>
									<?php }?>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
