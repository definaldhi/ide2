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
            <li>
              <a href="home.php">Home</a>
            </li>
            <li>
              <a href="keranjang.php">
                <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
              </a>
            </li>
            <li>
              <a href="checkout.php">Checkout</a>
            </li>
            <li class="active">
              <a href="rakitpc.php">
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>Rakit Online</a>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategori
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="processor.php">Processor</a>
                </li>
                <li>
                  <a href="vga.php">VGA</a>
                </li>
                <li>
                  <a href="ram.php">RAM</a>
                </li>
                <li>
                  <a href="harddisk.php">Harddisk</a>
                </li>
                <li>
                  <a href="mobo.php">Mother Board</a>
                </li>
                <li>
                  <a href="psu.php">Power Supply</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Info Lain
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="carapesan.php">Cara Memesan</a>
                </li>
                <li>
                  <a href="aboutus.php">Tentang Kami</a>
                </li>
                <li>
                  <a href="artikel.php">Artikel</a>
                </li>
              </ul>
            </li>
            <?php if (isset($_SESSION["pelanggan"])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
                <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="profile.php">Ganti Profil</a>
                </li>
                <li>
                  <a href="logout.php">Logout</a>
                </li>
                <?php else: ?>
                <li>
                  <a href="login.php">Login</a>
                </li>
                <?php endif ?>
              </ul>
            </li>
          </ul>
        </div>
    </nav>
  </body>

  <body>
  <div class="container-fluid">
    <div class="col-md-12">
    <legend>Rakit Komputer Kinghardware</legend>
    <div class="col-md-6">
    <!-- <h1>Rakit Komputer Kinghardware</h1> -->
    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <select class="form-control" name="processor" id="processor">
          <option value="">Pilih Brand Processor</option>
          <option value="1">Intel</option>
          <option value="2">AMD</option>
        </select>
      </div>
      <div class="form-group">
        <select class="form-control" name="tipe" id="tipe_processor">
          <option value="">Pilih Processor</option>
        </select></div>
        <div class="form-group">
        <select class="form-control" name="vga" id="vga">
          <option value="">Pilih VGA</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 2");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
            <option value="<?php echo $perproduk[" id_produk "] ?>" harga="<?php echo $perproduk['harga_produk'] ?>">
              <?php echo $perproduk['nama_produk'] ?> (Rp.
              <?php echo number_format($perproduk['harga_produk']) ?>)
            </option>
            <?php } ?>
        </select></div>
        <div class="form-group">
        <select class="form-control" name="hdd" id="hdd">
          <option value="">Pilih Harddisk</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 3");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
            <option value="<?php echo $perproduk[" id_produk "] ?>" harga="<?php echo $perproduk['harga_produk'] ?>">
              <?php echo $perproduk['nama_produk'] ?> (Rp.
              <?php echo number_format($perproduk['harga_produk']) ?>)
            </option>
            <?php } ?>
        </select></div>
        <div class="form-group">
        <select class="form-control" name="mobo" id="mobo">
          <option value="">Pilih Motherboard</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 4");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
            <option value="<?php echo $perproduk[" id_produk "] ?>" harga="<?php echo $perproduk['harga_produk'] ?>">
              <?php echo $perproduk['nama_produk'] ?> (Rp.
              <?php echo number_format($perproduk['harga_produk']) ?>)
            </option>
            <?php } ?>
        </select></div>
        <div class="form-group">
        <select class="form-control" name="ram" id="ram">
          <option value="">Pilih RAM</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 6");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
            <option value="<?php echo $perproduk[" id_produk "] ?>" harga="<?php echo $perproduk['harga_produk'] ?>">
              <?php echo $perproduk['nama_produk'] ?> (Rp.
              <?php echo number_format($perproduk['harga_produk']) ?>)
            </option>
          <?php } ?>
        </select>
        </div>
        <div class="form-group">
        <select class="form-control" name="psu" id="psu">
          <option value="">Pilih PSU</option>
          <?php
          $ambil = $koneksi->query("SELECT * FROM produk WHERE id_kategori = 5");
          while($perproduk = $ambil->fetch_assoc()){
          ?>
            <option value="<?php echo $perproduk[" id_produk "] ?>" harga="<?php echo $perproduk['harga_produk'] ?>">
              <?php echo $perproduk['nama_produk'] ?> (Rp.
              <?php echo number_format($perproduk['harga_produk']) ?>)
            </option>
          <?php } ?>
        </select>
        </div>
        <div class="form-group">
            <legend>Total</legend>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <input type="input" class="form-control" value="Qty" disabled/>
        </div>
        <div class="form-group">
            <input type="number" id="qty_tipe" class="form-control" min="1" value="1">
        </div>
        <div class="form-group">
            <input type="number" id="qty_vga" class="form-control" min="1" value="1">
        </div>
        <div class="form-group">
            <input type="number" id="qty_hdd" class="form-control" min="1" value="1">
        </div>
        <div class="form-group">
            <input type="number" id="qty_mobo" class="form-control" min="1" value="1">
        </div>
        <div class="form-group">
            <input type="number" id="qty_ram" class="form-control" min="1" value="1">
        </div>
        <div class="form-group">
            <input type="number" id="qty_psu" class="form-control" min="1" value="1">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
            <input type="input" class="form-control" value="Subtotal" disabled/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_tipe" class="form-control" readonly/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_vga" class="form-control" readonly/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_hdd" class="form-control" readonly/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_mobo" class="form-control" readonly/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_ram" class="form-control" readonly/>
        </div>
        <div class="form-group">
            <input type="text" id="subtotal_psu" class="form-control" readonly/>
        </div>
        <div class="form-group">
          <input type="text" id="total" class="form-control" readonly/>
        </div>
      </div>
        <a href="<?php echo 'beli.php?id='.$perproduk['id_produk'].''?>" class="btn btn-primary btn-lg col-md-12">Beli</a>
      </div>
    </form>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function () {
        var subtotal_tipe = 0;
        var subtotal_vga = 0;
        var total = 0;
        $('#subtotal_hdd,#subtotal_mobo,#subtotal_ram,#subtotal_psu').val("0");
        $('#subtotal_tipe').val(subtotal_tipe);
        $('#subtotal_vga').val(subtotal_vga);
        $('#total').val(total);
        $('#processor').change(function () {
          var id = $(this).val();
          $.ajax({
            url: "tipe_processor.php?id=" + id,
            type: 'get',
            cache: false,
            success: function (return_data) {
              if (!$.trim(return_data)) {
                $('#tipe_processor').find('option').not(':first').remove();
                $('#tipe_processor').append('<option value="">Pilih Processor</option>');
              } else {
                $('#tipe_processor').find('option').not(':first').remove();
                $('#tipe_processor').append(return_data);
              }
            }
          });
        });
        $('#tipe_processor, #vga, #hdd, #mobo, #ram, #psu').change(function () {
          if($("#tipe_processor").find(":selected").attr("harga")){
            $('#subtotal_tipe').val($("#tipe_processor").find(":selected").attr("harga"));
          } else {
            $('#subtotal_tipe').val("0");
          }
          if($("#vga").find(":selected").attr("harga")){
            $('#subtotal_vga').val($("#vga").find(":selected").attr("harga"));
          } else {
            $('#subtotal_vga').val("0");
          }
          if($("#hdd").find(":selected").attr("harga")){
            $('#subtotal_hdd').val($("#hdd").find(":selected").attr("harga"));
          } else {
            $('#subtotal_hdd').val("0");
          }
          if($("#mobo").find(":selected").attr("harga")){
            $('#subtotal_mobo').val($("#mobo").find(":selected").attr("harga"));
          } else {
            $('#subtotal_mobo').val("0");
          }
          if($("#ram").find(":selected").attr("harga")){
            $('#subtotal_ram').val($("#ram").find(":selected").attr("harga"));
          } else {
            $('#subtotal_ram').val("0");
          }
          if($("#psu").find(":selected").attr("harga")){
            $('#subtotal_psu').val($("#psu").find(":selected").attr("harga"));
          } else {
            $('#subtotal_psu').val("0");
          }
        });
        $('#qty_tipe').change(function () {
          subtotal_tipe = $("#tipe_processor").find(":selected").attr("harga") * $(this).val();
          $('#subtotal_tipe').val(subtotal_tipe);
        });
        $('#qty_vga').change(function () {
          subtotal_vga = $("#vga").find(":selected").attr("harga") * $(this).val();
          $('#subtotal_vga').val(subtotal_vga);
        });
        var subtipe = parseInt($('#subtotal_tipe').val());
        var subvga = parseInt($('#subtotal_vga').val());
        total = subtipe + subvga;
        $('#total').val(total);
      })
    </script>

  </html>
