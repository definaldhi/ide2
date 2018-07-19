<h2>Update Product</h2>

<?php
$ambil= $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah= $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan']; ?>">
	</div>
	<div class="form-group">
		<input type="text" readonly value="<?php echo $pecah['email_pelanggan']; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<textarea class="form-control" name="alamat" rows="10">
			<?php echo $pecah['alamat_pelanggan']; ?>
		</textarea>
	</div>	
	<div class="form-group">
		<label>No. Telepon Pelanggan</label>
		<input type="text" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
	</div>
	<button class="btn btn-primary" name="ubah">Simpan</button>
</form>

<?php
if (isset($_POST['ubah']))
{

	{
		$koneksi->query("UPDATE pelanggan SET nama_pelanggan='$_POST[nama]',alamat_pelanggan='$_POST[alamat]',telepon_pelanggan='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]'");
	}
	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
?>
