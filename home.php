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
    <title>KingHardware | Home</title>
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
        <li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></a></li>
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


<! -- konten -->
<section class="konten">
	<div class="container">
		<div class="jumbotron">
  <h1>Selamat Datang di Kinghardware</h1>
  <p>Kinghardware menyediakan berbagai macam kebutuhan hardware untuk komputer anda. Kepuasan anda berbelanja merupakan prioritas kami. </p>
</div>
		

<!-- SORTING -->

                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-danger"><strong>
                            <?php $ambil = $koneksi->query("SELECT * FROM produk"); 
                            $jumlah = $ambil->num_rows;
                            echo $jumlah; 
                            ?>  </strong>produk</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Filter Berdasarkan &nbsp;
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="home.php?id=<?php echo 'Semua Kategori'?>&by=<?php echo 'asc'; ?>#produk">Harga Terendah</a></li>
                                <li class="divider"></li>
                                <li><a href="home.php?id=<?php echo 'Semua Kategori'?>&by=<?php echo 'desc'; ?>#produk">Harga Tertinggi</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <br><br>
                <?php 
                    $ascdesc = isset($_GET['by']) ? $_GET['by'] : null;
                ?>

                <!-- /.row -->
                <div class="row">

                    <?php
                    $halaman = 9;
                    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                    ?>

                    <?php $ambil = $koneksi->query("SELECT * FROM produk ORDER BY harga_produk $ascdesc "); ?>

                    <?php
                    $total = $ambil->num_rows;
                    $pages = ceil($total/$halaman);
                    ?>

                    <?php
                    $ambil = $koneksi->query("SELECT * FROM produk ORDER BY harga_produk $ascdesc LIMIT $mulai, $halaman")
                    ?>

                    <?php while($perproduk = $ambil->fetch_assoc()){ ?>

                  <div class="col-md-4 col-sm-12"> 
                <div class="thumbnail">
                    <img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" style="height: 200px;">
                    <div class="caption">
                        <h5><?php echo $perproduk['nama_produk']; ?></h5>
                        <h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
                        <a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
                        <a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-warning">detail</a>
                    </div>
                </div>
                    </div>

                  
                    <?php } ?>



                </div>

                    <div class="row">

                        <?php 
                        $id = isset($_GET['halaman']) ? $_GET['halaman'] : null;
                        $idmin = $id - 1;
                        ?>

                        <?php 
                        $id = isset($_GET['halaman']) ? $_GET['halaman'] : null; 
                        $idplus = $id + 1;
                        ?>

                        <ul class="pagination alg-right-pad">
                            <li><a href="?halaman=<?php echo $idmin; ?>#produk">&laquo;</a></li>

                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                            <!--<li><a href="#">&laquo;</a></li>-->
                            <li><a href="?halaman=<?php echo $i; ?>#produk"><?php echo $i; ?></a></li>
                            <!--<li><a href="#">&raquo;</a></li>-->
                         <?php } ?>

                            <li><a href="?halaman=<?php echo $idplus; ?>#produk">&raquo;</a></li>
                        </ul>
                    </div>
        </div>
    </div>
</section>
    <!--Footer -->
    <div class="col-md-12 footer-box">


        <div class="row small-box ">
            <strong>Mobiles :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
         
        </div>
        <div class="row small-box ">
            <strong>Laptops :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Laptops</a> | 
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony Laptops</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
        </div>
        <div class="row small-box ">
            <strong>Tablets : </strong><a href="#">samsung</a> |  <a href="#">Sony Tablets</a> | <a href="#">Microx</a> | 
            <a href="#">samsung </a>|  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx</a> |<a href="#">samsung Tablets</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx Tablets</a> | view all items
            
        </div>
        <div class="row small-box pad-botom ">
            <strong>Computers :</strong> <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> | 
            <a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |
              <a href="#">Sony</a> | <a href="#">Microx</a> |<a href="#">samsung</a> |  <a href="#">Sony</a> | 
            <a href="#">Microx Computers</a> |<a href="#">samsung Computers</a> |  <a href="#">Sony</a> | <a href="#">Microx</a> |
            <a href="#">samsung</a> |  <a href="#">Sony</a> | <a href="#">Microx Computers</a> |<a href="#">samsung</a> |  
            <a href="#">Sony</a> | <a href="#">Microx</a> | view all items
            
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Send a Quick Query </strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit Request</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Our Location</strong>
                <hr>
                <p>
                     234, New york Street,<br />
                                    Just Location, USA<br />
                    Call: +09-456-567-890<br>
                    Email: info@yourdomain.com<br>
                </p>

                2014 www.yourdomain.com | All Right Reserved
            </div>
            <div class="col-md-4 social-box">
                <strong>We are Social </strong>
                <hr>
                <a href="#"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="#"><i class="fa fa-linkedin-square fa-3x "></i></a>
                <a href="#"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. Curabitur nec nisl odio. Mauris vehicula at nunc id posuere. 
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box ">
        &copy; 2018 | &nbsp; All Rights Reserved | &nbsp; www.kinghardwareshop.com | &nbsp; 24x7 support | &nbsp; Email us: kinghardwareshop@gmail.com
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</div>
</html>
