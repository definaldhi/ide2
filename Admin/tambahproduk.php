<center><h2>ADD PRODUCT</h2></center>
<center><strong><h4>Keterangan ID Kategori & ID Merk</h4></strong></center>
<section class="konten">
   <div class="container">

							<div class="row">
								<div class="col-md-6">
									<h5></h5>
									Masukan ID kategori 1 untuk Processor<br>
									Masukan ID kategori 2 untuk VGA<br>
									Masukan ID kategori 3 untuk Harddisk<br>
									Masukan ID kategori 4 untuk MotherBoard<br>
									Masukan ID kategori 5 untuk PSU<br>
									Masukan ID kategori 6 untuk RAM<br>
								</div>
								<div class="col-md-6">
									<h5></h5>
									Masukan ID Merk 1 untuk Intel<br>
									Masukan ID Merk 2 untuk AMD<br>
									Masukan ID Merk 3 untuk Seagate<br>
									Masukan ID Merk 4 untuk Radeon<br>
									Masukan ID Merk 5 untuk PSU<br>
									Masukan ID Merk 6 untuk RAM<br>
								</div>
							</div>
	</div>
</section>	<br>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Masukan ID kategori</label>
		<input type="number" class="form-control" name="kategori">
	</div>
	<div class="form-group">
		<label>Masukan ID Merk</label>
		<input type="number" class="form-control" name="merk">
	</div>
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="float" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div>
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi =$_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(id_kategori,id_merek,nama_produk,harga_produk,foto_produk,deskripsi_produk)
		VALUES('$_POST[kategori]','$_POST[merk]','$_POST[nama]','$_POST[harga]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
		
}
?>