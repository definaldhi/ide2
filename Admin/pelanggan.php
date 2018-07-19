<h2>Data Pelanggan</h2>
<form action="pelanggan.php" method="get">
	<label>Cari :</label>
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Call Number</th>
			<th>Action</th>
		</tr>
	</thead>

</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php 
		$koneksi = new mysqli("localhost","root","","ideshop");
		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan LIKE '%".$cari."%'");
			echo "<b>Hasil pencarian : ".$cari."</b>";
			while($pecah = $ambil->fetch_assoc()){
				echo "<tr>
						<td>".$nomor."</td>
						<td>".$pecah['nama_pelanggan']."</td>
						<td>
						<a href='index.php?halaman=hapuspelanggan&id=".$pecah['id_pelanggan']."' class='btn-danger btn-xs'>DELETE</a>
						<a href='index.php?halaman=ubahpelanggan&id=".$pecah['id_pelanggan']."' class='btn-xs btn-warning'>UPDATE</a>
						</td>
					</tr>";
			}
		}
		?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['alamat_pelanggan']; ?> </td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-danger btn-xs">DELETE</a>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-xs btn-warning">UPDATE</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="" class="btn btn-primary">Add Customer</a>	