<center><h2>DETAIL PEMESANAN</h2></center>
<?php
$ambil = $koneksi->query("SELECT * FROM tabel_pembelian JOIN pelanggan 
	ON tabel_pembelian.id_pelanggan=pelanggan.id_pelanggan 
	WHERE tabel_pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<section class="konten">
                      	<div class="container">
                      		
                      		
							<?php
								$ambil = $koneksi->query("SELECT * FROM tabel_pembelian JOIN pelanggan 
								ON tabel_pembelian.id_pelanggan=pelanggan.id_pelanggan 
								WHERE tabel_pembelian.id_pembelian='$_GET[id]'");
								$detail = $ambil->fetch_assoc();
							?>
							
							<div class="row">
								<div class="col-md-4">
									<h3>PEMESANAN</h3>
									<strong>No. Pemesanan : <?php echo $detail['id_pembelian']?></strong><br>
									tanggal : <?php echo $detail['tanggal_pembelian'];?><br>
									<strong>total : Rp. <?php echo number_format($detail['total_pembelian'])?></strong>
								</div>
								<div class="col-md-4">
									<h3>PELANGGAN</h3>
									<strong>Nama Pelanggan : <?php echo $detail['nama_pelanggan']?></strong><br>
									No. Telepon : <?php echo $detail['telepon_pelanggan'];?><br>
									Email : <?php echo $detail['email_pelanggan'];?>
								</div>
								<div class="col-md-4">
									<h3>PENGIRIMAN</h3>
									<strong><?php echo $detail['nama_kota']?></strong><br>
									Ongkos kirim : Rp. <?php echo number_format($detail['tarif'])?><br> 
									alamat : <?php echo $detail['alamat_pelanggan']?>
								</div>
							</div>
							</div>
							<br>

<table class="table table-bordered">
	<thread>
		<tr>
			<th>no</th>
			<th>nama produk</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>subtotal</th>
		</tr>
	</thread>
	<tbody>
						<?php $nomor=1; ?>
							<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
							<?php while($pecah = $ambil->fetch_assoc()){ ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['nama']; ?></td>
								<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
								<td><?php echo $pecah['jumlah']; ?></td>
								<td>Rp. <?php echo number_format($pecah['subharga']);?></td>
							</tr>
						<?php $nomor++; ?>
						<?php } ?>
					</tbody>
</table>
