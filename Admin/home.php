<?php

if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda harus login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>
 <h2>KINGHARDWARE Administrator</h2>   
 <h5>Welcome, Love to see you back. </h5>
 <pre><strong><?php print_r($_SESSION['admin']['nama_lengkap']); ?></strong></pre>