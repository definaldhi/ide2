<h2>detail pembelian</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM tabel_pembelian JOIN pelanggan 
	ON tabel_pembelian.id_pelanggan=pelanggan.id_pelanggan 
	WHERE tabel_pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<pre><?php print_r($detail); ?></pre>

<strong><?php echo $detail['nama_pelanggan']; ?></strong>
<p>
	<?php echo $detail['telepon_pelanggan']; ?> <br>
	<?php echo $detail['email_pelanggan']; ?> <br>
</p>

<p>
	Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
	Total: <?php echo $detail['jumlah_pembelian']; ?>
</p>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga produk</th>
			<th>jumlah pembelian</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM tabel_pembelian JOIN produk ON tabel_pembelian. id_produk=produk. id_produk
		WHERE tabel_pembelian. id_pembelian='$_GET[id]'"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['jumlah_pembelian']; ?></td>
			<td>
				<?php echo $pecah['harga_produk']*$pecah['jumlah_pembelian']; ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>