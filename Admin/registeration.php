<?php
$koneksi = new mysqli("localhost","root","","ideshop")
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br /><br />
                <h2> Binary Admin : Register</h2>
               
                <h5>( Register yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  New User ? Register Yourself </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" class="form-control" name="user" placeholder="Your Name" required="required" autofocus="autofocus"></input>
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="required" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="pass" placeholder="Enter Password" required="required" />
                                        </div>
                               
                                     
                                     <button type="submit" class="btn btn-success" name="register">Register Me</button>
                                    <hr />
                                    Already Registered ?  <a href="login.html" >Login here</a>
                                    </form>
                                    <?php
                                    if (isset($_POST['register']))  //jika button diklik,maka akan menjalankan perintah dibawah ini
                                    {
                                      $user = $_POST['user'];
                                      $email = $_POST['email'];
                                      $pass = $_POST['pass'];

                                      $user = mysqli_real_escape_string($koneksi, $user); 
                                      $email = mysqli_real_escape_string($koneksi, $email);
                                      $pass = md5($pass); //untuk enkripsi password,menghindari perusakan data

                                      $sql = "SELECT email_pelanggan FROM pelanggan WHERE email_pelanggan='$email'";
                                      $result = mysqli_query($koneksi, $sql);
                                      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                                      if (mysqli_num_rows($result) == 1) {
                                        echo "<div class='alert alert-info'>Dah Ada</div>";
                                      } else {
                                        $query = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, email_pelanggan, password_pelanggan) VALUES ('$user', '$email', '$pass')");
                                        if ($query) {
                                            $ambil = "SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$pass'";
                                            $_SESSION['pelanggan']=$ambil->fetch_assoc();
                                            // session_start();
                                            echo "<div class='alert alert-info'>Daftar Berhasil</div>";
                                            echo "<meta http-equiv='refresh' content='1;url=home.php'>";
                                        }
                                      }
                                    }
                                    ?>  
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
