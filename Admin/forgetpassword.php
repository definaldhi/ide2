<?php
	if (isset($_POST["forgotpass"])) {
		$koneksi = new mysqli("localhost","root","","ideshop");

		$email = $koneksi->real_escape_string($_POST["email"]);

		$ambil = $koneksi->query("SELECT id_pelanggan FROM pelanggan WHERE email='$email'");

		if ($ambil->nums_rows > 0) {
			$str = "0123456789qwertyuiopasdfghjklzxcvbnm";
			$str = str_shuffle($str);
			$str = substr($str, 0, 10);
			$url ="http://localhost/ide2/resetpassword.php?token=$str&email=$email";

			mail($email, "Reset Password", "To reset visit: $url", "From: myahahah@domain.com\r\n");

			$koneksi->query("UPDATE pelanggan SET token='$str' WHERE email='$email'");

			echo "cek email anda";
		} else {
			echo "Masukan Email yang valid!";
		}
	}
?>
<!DOCTYPE html>
<html>
<body>
<form action="forgetpassword.php" method="post">
	<input type="text" name="email" placeholder="Email"><br>
	<input type="submit" name="forgotpass" value="Request Password"/>
</form>
</body>
</html>