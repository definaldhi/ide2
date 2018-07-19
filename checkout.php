<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");

//jika tidak ada session pelanggan maka dialihkan ke halaman login
if(!isset($_SESSION["pelanggan"]))
{
	echo "<script>alert('please login first');</script>";
	echo "<script>location='login.php';</script>";
}
if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('silahkan pilih produk terlebih dahulu');</script>";
	echo "<script>location='home.php';</script>";
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
			<li><a href="home.php"></span>Home</a></li>
			<li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
			<li class="active"><a href="checkout.php"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Checkout</a></li>
			<li><a href="rakitpc.php">Rakit Online</a></li>
			<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#">Cara Memesan</a></li>
				<li><a href="#">Tentang Kami</a></li>
				<li><a href="#">Artikel</a></li> 
			</ul>
		</li> 
		</ul>
		<ul class="nav navbar-nav navbar-right">
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
			</li>
			</ul>
				<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Info Lain
			<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="#">Cara Memesan</a></li>
				<li><a href="#">Tentang Kami</a></li>
				<li><a href="#">Artikel</a></li> 
			</ul>
		</li> 
			  </ul>
			</li>
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
				<?php $totalbelanja = 0; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah): ?>
					<!-- memampilkan id produk yang sedang di perulangkan berdasarkan id_produk -->
				<?php
				$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_produk"]*$jumlah

				?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_produk"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
				</tr>
			<?php $nomor++; ?>
			<?php $totalbelanja+=$subharga; ?>
			<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>

		
			<div class="row">
				<div class="col-md-4" ><form method="post">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4" ><form method="post">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION['pelanggan']['alamat_pelanggan']?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="id_ongkir">
					<option value="">Pilih Biaya Pengiriman</option>
					<?php
					$ambil = $koneksi->query("SELECT * FROM ongkir");
					while($perongkir = $ambil->fetch_assoc()){
					?>
					<option value="<?php echo $perongkir["id_ongkir"] ?>">
						<?php echo $perongkir['nama_kota'] ?> .
						Rp. <?php echo number_format($perongkir['tarif']) ?>
					</option>
					<?php } ?>	
					</select>
				</div>
			</div>
		<button class="btn btn-primary" name="checkout" >Checkout</button>
	</form>
	

	<?php 
	if (isset($_POST["checkout"]))
	{
		
		$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
		$id_ongkir = $_POST["id_ongkir"];
		$tanggal_pembelian = date("Y-m-d");
		$email_pelanggan = $_SESSION["pelanggan"]["email_pelanggan"];
		$nama_pelanggan = $_SESSION["pelanggan"]["nama_pelanggan"];

		$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
		$pecah = $ambil->fetch_assoc();
		$nama_kota = $pecah['nama_kota'];
		$tarif = $pecah['tarif'];

		$total_pembelian = $totalbelanja + $tarif;

		// Menyimpan data ke tabel pembelian
		$koneksi->query("INSERT INTO tabel_pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif') " );

		//mendapatkan id_pembelian barusan terjadi
		$id_pembelian_tadi = $koneksi->insert_id;

		foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
		{
				// mendapartkan data produk berdasarkan id produk
				$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
				$perproduk = $ambil->fetch_assoc();

				$nama = $perproduk['nama_produk'];
				$harga = $perproduk['harga_produk'];
				$subharga = $perproduk['harga_produk']*$jumlah;

			$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,nama,harga,subharga,id_produk,jumlah) VALUES ('$id_pembelian_tadi','$nama','$harga','$subharga','$id_produk','$jumlah') ");

			//update stok produk
			$koneksi->query("UPDATE produk SET stok=stok -$jumlah WHERE id_produk='$id_produk'");
		}
 		
 		require "phpmailer/class.phpmailer.php"; //include phpmailer class

	    // Instantiate Class
	    $mail = new PHPMailer();

	    // Set up SMTP
	    $mail->IsSMTP();                // Sets up a SMTP connection
	    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
	    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection
	    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
	    $mail->Port = 465;  //Gmail SMTP port
	    $mail->Encoding = '7bit';

	    // Authentication
	    $mail->Username   = "dennis.finaldhi@gmail.com";// Your full Gmail address
	    $mail->Password   = "gwstvafxzcqapqzd"; // Your Gmail password

	    // Compose
	    $mail->SetFrom("KingHardware@gmail.com", "KingHardware");
	    // $mail->AddReplyTo($email_, $name);
	    $mail->Subject = "ID Pembelian $id_pembelian_tadi";      // Subject (which isn't required)
	    $mail->MsgHTML("Ini detail pembelian kamu dengan ID $id_pembelian_tadi . silahkan lakukan pembayaran ke nomer rekening yang tertera pada nota pemesanan.Terimakasih telah berbelanja di toko kami.");

	    // Send To
	    $mail->AddAddress($email_pelanggan, $nama_pelanggan); // Where to send it - Recipient
	    		// Send!
	    if (!$result = $mail->Send())
	    {
	      echo "Error: $result->ErrorInfo";
	      alert("Error: $result->ErrorInfo");
	    }
	    else
	    {
	      echo "Message Sent!";
	    }
		// $message = $result ? 'Successfully Sent!' : 'Sending Failed!';
		unset($mail);
 		//mengkosongkan keranjang setelah checkout
 		unset($_SESSION["keranjang"]);

		//alihkan ke halaman nota dari pembelian barusan
		echo"<script>alert('checkout sukses');</script>";
		echo"<script>location='nota.php?id=$id_pembelian_tadi';</script>";
	}

	?>
	</div>
</section>		
<pre><?php print_r($_SESSION['pelanggan']) ?></pre>
<pre><?php print_r($_SESSION['keranjang']) ?></pre>
<pre><?php print_r($pecah)?></pre>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
