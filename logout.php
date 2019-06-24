<?php 
    session_start();
    session_destroy();
    if(isset($_SESSION['username'])){
        Print '<script>alert("Thanks for Using the App,Bye!")</script>';
        Print '<script>window.location.assign("index.php")</script>';    
    }else{
        Print '<script>alert("Page not found")</script>';
        Print '<script>window.location.assign("index.php")</script>';
	}
    
?>