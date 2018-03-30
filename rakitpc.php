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
			<li><a href="home.php">Home</a></li>
			<li><a href="keranjang.php">Keranjang</a></li>
			<li><a href="checkout.php">Checkout</a></li>
			<li class="active"><a href="rakitpc.php">Rakit Online</a></li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
              	<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>  <!-- pemanggilan nama berdasarkan session -->
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="#">Ganti Profil</a></li>
			    <li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
