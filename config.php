<?php
    $connect = mysqli_connect("localhost","root","") or die(mysql_error());
    mysqli_select_db($connect,"task_marta") or die("Can't connect to Database");

    session_start();

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
    }else{
        Print '<script>alert("Page not found")</script>';
        Print '<script>window.location.assign("index.php")</script>';
	}
?>