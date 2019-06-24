<?php 
    $connect = mysqli_connect("localhost","root","") or die(mysql_error());
    mysqli_select_db($connect,"task_marta") or die("Can't connect to Database");

    // mengaktifkan session
    session_start();

    // cek apakah user telah login, jika belum login maka di alihkan ke halaman login
    if(isset($_SESSION['status'])){
        Print '<script>window.location.assign("page.php")</script>';
    }else{
        Print '<script>window.location.assign("login.php")</script>';
    }
?>
