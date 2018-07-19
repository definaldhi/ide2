<?php
session_start();
//koneksi database
$koneksi = new mysqli("localhost","root","","ideshop");


if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KingHardware Administrator</title>
	<!-- BOOTSTRAP STYLES-->
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
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">KINGHARDWARE</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : "date("Y-m-d")"; &nbsp; <a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
					</li>


    <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>HOME</a></li>
     <li><a href="#"><i class="glyphicon glyphicon-th-list"></i>PRODUK<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                             <li>
                                <a href="index.php?halaman=produk">Semua Produk</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=processor">Processor</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=vga">VGA</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=ram">RAM</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=mobo">Mother Board</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=harddisk">Harddisk</a>
                            </li>
                            <li>
                                <a href="index.php?halaman=psu">Power Supply</a>
                            </li>
                        </ul>
                    </li>
    <li><a href="index.php?halaman=pembelian"><i class="glyphicon glyphicon-check"></i>PEMBELIAN</a></li>
    <li><a href="index.php?halaman=pelanggan"><i class="glyphicon glyphicon-user"></i>PELANGGAN</a></li>
    <li><a href="index.php?halaman=logout"><i class="glyphicon glyphicon-log-out"></i>LOGOUT</a></li>                          	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                    
                <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="produk")
                    {
                        include 'produk.php';
                    }
                    elseif ($_GET['halaman']=="kategori")
                    { 
                        include 'kategori.php';
                    }
                    elseif ($_GET['halaman']=="vga")
                    { 
                        include 'vga.php';
                    }
                    elseif ($_GET['halaman']=="ram")
                    { 
                        include 'ram.php';
                    }
                    elseif ($_GET['halaman']=="processor")
                    { 
                        include 'processor.php';
                    }
                    elseif ($_GET['halaman']=="harddisk")
                    { 
                        include 'harddisk.php';
                    }
                    elseif ($_GET['halaman']=="mobo")
                    { 
                        include 'mobo.php';
                    }
                    elseif ($_GET['halaman']=="psu")
                    { 
                        include 'psu.php';
                    }
                    elseif ($_GET['halaman']=="pembelian")
                    { 
                        include 'pembelian.php';
                    }
                    elseif ($_GET['halaman']=="pelanggan") 
                    {
                        include 'pelanggan.php';
                    }
                    elseif ($_GET['halaman']=="detail")
                    {
                        include 'detail.php';
                    }
                    elseif ($_GET['halaman']=="tambahproduk")
                    {
                        include 'tambahproduk.php';
                    }
                    elseif ($_GET['halaman']=="tambahpelanggan") 
                    {
                        include 'tambahpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="hapusproduk") 
                    {
                        include 'hapusproduk.php';
                    }
                    elseif ($_GET['halaman']=="ubahproduk") 
                    {
                        include 'ubahproduk.php';
                    }
                    elseif ($_GET['halaman']=="hapuspelanggan") 
                    {
                        include 'hapuspelanggan.php';
                    }
                    elseif ($_GET['halaman']=="ubahpelanggan") 
                    {
                        include 'ubahpelanggan.php';
                    }
                    elseif ($_GET['halaman']=="logout") 
                    {
                        include 'logout.php';
                    }
                }
                else
                {
                    include 'home.php';
                }
                ?>        
                    </div>
                </div>              
                          
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <div class="row row-copirayt">
                <p class="text-center" class="panel-heading">
                    © Copyright 2018 KING HARDWARE - All Rights Reserved
                </p>
            </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
