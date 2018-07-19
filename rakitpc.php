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
      <li><a href="home.php">Home</a></li>
      <li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
      <li><a href="checkout.php">Checkout</a></li>
      <li class="active"><a href="rakitpc.php"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Rakit Online</a></li>
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
</body>
<body>
  <h1>Rakit Komputer Kinghardware</h1>
  
        <form method="post" enctype="multipart/form-data">
        <div class="col-md-6">
         <b>Processor</b>
        <select class="form-control" name="processor" id="processor">
          <option value="">Pilih processor</option>
          <option value="1">Intel</option>
          <option value="2">AMD</option>
        </select>
        <b id="tipe">Pilih tipe processor</b>
         <select class="form-control" name="tipe" id="tipe_processor">
          <option value="">Pilih tipe processor</option>
        </select>
        <b>VGA</b>
         <select class="form-control" name="vga">
          <option value="">Pilih VGA</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 2");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
          <option value="<?php echo $perproduk["id_produk"] ?>">
            <?php echo $perproduk['nama_produk'] ?> .
            Rp. <?php echo number_format($perproduk['harga_produk']) ?>
          </option>
          <?php } ?>
        </select>
        <b>HARDDISK</b>
         <select class="form-control" name="hdd">
          <option value="">Pilih Harddisk</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 3");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
          <option value="<?php echo $perproduk["id_produk"] ?>">
            <?php echo $perproduk['nama_produk'] ?> .
            Rp. <?php echo number_format($perproduk['harga_produk']) ?>
          </option>
          <?php } ?>
        </select>
        <b>MotherBoard</b>
         <select class="form-control" name="mobo">
          <option value="">Pilih MotherBoard</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 4");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
          <option value="<?php echo $perproduk["id_produk"] ?>">
            <?php echo $perproduk['nama_produk'] ?> .
            Rp. <?php echo number_format($perproduk['harga_produk']) ?>
          </option>
          <?php } ?>
        </select>
        <b>RAM</b>
         <select class="form-control" name="ram">
          <option value="">Pilih RAM</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 6");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
          <option value="<?php echo $perproduk["id_produk"] ?>">
            <?php echo $perproduk['nama_produk'] ?> .
            Rp. <?php echo number_format($perproduk['harga_produk']) ?>
          </option>
          
        </select>
        <b>PSU</b>
         <select class="form-control" name="vga">
          <option value="">Pilih PSU</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 5");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
          <option value="<?php echo $perproduk["id_produk"] ?>">
            <?php echo $perproduk['nama_produk'] ?> .
            Rp. <?php echo number_format($perproduk['harga_produk']) ?>
          </option>
        </select>
        <a href="<?php echo 'beli.php?id='.$perproduk['id_produk'].''?>" class="btn btn-primary">Beli</a>
         <?php } ?>
         <?php } ?>
</form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function(){
      $('#processor').change(function(){
        var id = $(this).val();
        // if (id=='') {
        //   $('#tipe_processor').html("<option value="">Pilih tipe processor</option>");
        // }
         $.ajax({
            url: "tipe_processor.php?id="+id,
            type: 'get',
            cache: false,
            success: function(return_data) {
               $('#tipe_processor').html(return_data);
            }
         });
      })
    })
  </script>
</html>
