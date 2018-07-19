<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");

?>
<!DOCTYPE html>
<html>
<head>
<meta name="description" content="Biodata"/>
<meta name="Keywords" content="Biodata"/>
<meta name="authors" content="Angga"/>
<meta charset="UTF-8"/>
<title>Biodata</title>
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
                       <section class="konten">
                        <div class="container">
                            <?php
                                if (isset($_SESSION["pelanggan"])): ?>
                                $detail = $ambil->fetch_assoc();
                            ?>
<form action="#" style="width: 1000px" class="posisi";>
<fieldset class="h"/>
<table style="width: 980px;">
<tr>
<td rowspan="15" width="250px">
<img src="a.jpg" width="250px" height="420px"/>
</td>
</tr>
<tr>
<td><b>Nama Lengkap</b></td>
<td>:</td>
<td><?php echo $detail['nama_pelanggan']?></td>
</tr>
  <?php else: ?>
<tr>
<td><b>Alamat Email</b></td>
<td>:</td>
<td><?php echo $detail['email_pelanggan']?></td>
</tr>
<tr>
<td><b>No. Telepon</b></td>
<td>:</td>
<td><?php echo $detail['telepom_pelanggan']?></td>
</tr>
<tr>
<td><b>Alamat Lengkap</b></td>
<td>:</td>
<td><?php echo $detail['alamat_pelanggan']?></td>
</tr>
  <?php endif ?>
<tr>
<td><b>Gol. Darah</b></td>
<td>:</td>
<td>AB</td>
</tr>
<tr>
<td><b>Agama</b></td>
<td>:</td>
<td>Islam</td>
</tr>
<tr>
<td><b>Alamat</b></td>
<td>:</td>
<td>Jln. Gajah Mada No. 53 Semarapura Klungkung, Bali</td>
</tr>
<tr>
<td><b>Status</b></td>
<td>:</td>
<td>Belum Menikah</td>
</tr>
<tr>
<td><b>Pekerjaan</b></td>
<td>:</td>
<td>Mahasiswa</td>
</tr>
<tr>
<td><b>Kewarganegaraan</b></td>
<td>:</td>
<td>Indonesia</td>
</tr>
<tr>
<td><b>Riwayat</b></td>
<td>:</td>
<td colspan="1" align="left">
Ingin Tahu Riwayatku ? <a href="Detail.html"style="text-decoration: none;" target="_parent"><input
type="button"value="Cari tahu ? "/></a>
</td>
</tr>
</table>
</fieldset>
</form>
</div>
</section>
</body>
</html>