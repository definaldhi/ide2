<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-4 col-sm-12">
				<div class="thumbnail">
					<img src="foto_produk/<?php echo $perproduk['foto_produk']; ?>" alt="" style="height: 200px;">
					<div class="caption">
						<h5><?php echo $perproduk['nama_produk']; ?></h5>
						<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
						<a href="beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">detail</a>
					</div>
				</div>
			</div>
			<?php } ?>

!-- SORTING -->

                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-danger"><strong>
                            <?php $result = $koneksi->query("SELECT * FROM produk"); 
                            $jumlah = $result->num_rows;
                            echo $jumlah; 
                            ?>  </strong>produk</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Filter Berdasarkan &nbsp;
                            <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="home.php?id=<?php echo 'Semua Tanaman'?>&by=<?php echo 'asc'; ?>#produk">Harga Terendah</a></li>
                                <li class="divider"></li>
                                <li><a href="home.php?id=<?php echo 'Semua Tanaman'?>&by=<?php echo 'desc'; ?>#produk">Harga Tertinggi</a></li>
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

                    <?php $result = $koneksi->query("SELECT * FROM produk ORDER BY harga_produk $ascdesc "); ?>

                    <?php
                    $total = $result->num_rows;
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
						<a href="detail.php?id=<?php echo $perproduk['id_produk'];?>" class="btn btn-default">detail</a>
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


							<?php
							$idpelangganbeli = $detail["id_pelanggan"];
							$idpelangganlogin = $_SESSION["pelanggan"]["id_pelanggan"];

							if ($idpelangganbeli!==$idpelangganlogin)
							{
								echo "<script>alert('tidak dapat diakses');</script>";
								echo "<script>location='riwayat.php';</script>";
							}
							?>
</thead>
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
				<div class="row">
								<div class="col-md-7"></div>
								<div class="alert alert-info">
									<p> 
										Silakan lakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']);?> ke <br>
										<strong>BANK MANDIRI 137-001088-3276 AN. DENNIS FINALDHI</strong>
									</p>
								</div>
									<a href="home.php" class="btn btn-primary">lanjutkan belanja</a>
									<a href="riwayat.php" class="btn btn-danger">Lihat Riwayat Belanja</a>
								</div>
              </div>
        </section>

</body>
</html>

<?php 
	if (isset($_POST["checkout"]))
	{
		
		$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
		$email_pelanggan = $_SESSION["pelanggan"]["email_pelanggan"];
		$nama_pelanggan = $_SESSION["pelanggan"]["nama_pelanggan"];
		$id_ongkir = $_POST["id_ongkir"];
		$tanggal_pembelian = date("Y-m-d");

		$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
		$pecah = $ambil->fetch_assoc();
		$nama_kota = $pecah['nama_kota'];
		$tarif = $pecah['tarif'];

		$total_pembelian = $totalbelanja + $tarif;

		// Menyimpan data ke tabel pembelian
		$koneksi->query("INSERT INTO tabel_pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif') " );

		//mendapatkan id_pembelian barusan terjadi
		$id_pembelian_tadi = $koneksi->insert_id;

		foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) 
		{
			$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
			$perproduk=$ambil->fetch_assoc();

			$nama = $perproduk['nama_produk'];
			$harga = $perproduk['harga_produk'];
			$subharga = $perproduk['harga_produk']*$jumlah;

			$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama,harga,subharga,jumlah) VALUES ('$id_pembelian_tadi','$id_produk','$nama','$harga','$subharga','$jumlah')");
		}

		require "phpmailer/class.phpmailer.php"; //include phpmailer class

	    // Instantiate Class
	    $mail = new PHPMailer();

	    // Set up SMTP
	    $mail->IsSMTP();                // Sets up a SMTP connection
	    $mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
	    $mail->SMTPSecure = "ssl";      // Connect using a TLS connection
	    $mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
	    $mail->Port = 465;  //Gmail SMTP port
	    $mail->Encoding = '7bit';

	    // Authentication
	    $mail->Username   = "dennis.finaldhi@gmail.com";// Your full Gmail address
	    $mail->Password   = "gwstvafxzcqapqzd"; // Your Gmail password

	    // Compose
	    $mail->SetFrom("KingHardware@gmail.com", "KingHardware");
	    // $mail->AddReplyTo($email_, $name);
	    $mail->Subject = "ID Pembelian $id_pembelian_tadi";      // Subject (which isn't required)
	    $mail->MsgHTML("Ini detail pembelian kamu dengan ID $id_pembelian_tadi . silahkan lakukan pembayaran ke nomer rekening yang tertera pada nota pemesanan.Terimakasih telah berbelanja di toko kami.");

	    // Send To
	    $mail->AddAddress($email_pelanggan, $nama_pelanggan); // Where to send it - Recipient
	    		// Send!
	    if (!$result = $mail->Send())
	    {
	      echo "Error: $result->ErrorInfo";
	      alert("Error: $result->ErrorInfo");
	    }
	    else
	    {
	      echo "Message Sent!";
	    }
		// $message = $result ? 'Successfully Sent!' : 'Sending Failed!';
		unset($mail);
 		
 		//mengkosongkan keranjang setelah checkout
 		unset($_SESSION["keranjang"]);

		//alihkan ke halaman nota dari pembelian barusan
		echo"<script>alert('checkout sukses');</script>";
		echo"<script>location='nota.php?id=$id_pembelian_tadi';</script>";
	}

	?>
	</div>
</section>		