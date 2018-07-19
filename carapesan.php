<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");


//if (!isset($_SESSION['pelanggan']))
//{
    //echo "<script>alert('Anda harus login');</script>";
    //echo "<script>location='login.php';</script>";
    //header('location:login.php');
    //exit();
//

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
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>
			  <span class="caret"></span></a>
			  <ul class="dropdown-menu">
			  	<li><a href="profile.php">Ganti Profil</a></li>
			    <li><a href="logout.php">Logout</a></li>
			    <?php else: ?>
			     <li><a href="login.php">Login</a></li>
				<?php endif ?> 
			  </ul>
			</li>
		</ul>
	</div>
</nav>

<footer class="page-footer font-small blue pt-4 mt-4">

    <!--Footer Links-->
    <div class="container-fluid text-center text-md-left">
        <div class="row">

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center">
        © 2018 Copyright:
        <a href="home.php"> KingHardware </a>
    </div>
    <!--/.Copyright-->

</footer>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>