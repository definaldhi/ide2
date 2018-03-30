<h2>Data Pelanggan</h2>
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
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['alamat_pelanggan']; ?> </td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href="" class="btn-danger btn">DELETE</a>
				<a href="" class="btn btn-warning">UPDATE</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="" class="btn btn-primary">Add Customer</a>	