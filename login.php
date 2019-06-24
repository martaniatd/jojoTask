<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $connect = mysqli_connect("localhost","root","") or die(mysql_error());
    mysqli_select_db($connect,"task_marta") or die("Can't connect to Database");

	$username = mysqli_real_escape_string($connect,$_POST['username']);
    $password = mysqli_real_escape_string($connect,$_POST['password']);
    $password = md5($password);

	$bool = true;

    $query = mysqli_query($connect,"Select * from users WHERE username='$username'");
    if(mysqli_num_rows($query) > 0 ){
        $row = mysqli_fetch_array($query);
        $password_user = $row['password'];
        if($password != $password_user){
			$bool = false;
			Print '<script>alert("Password not Match!")</script>';
		}
    }else{
        $bool = false;
        Print '<script>alert("Username not Registered!")</script>';
    }

	if($bool){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        Print '<script>window.location.assign("index.php")</script>';
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Task Marta</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Login </h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="input-group">
                                <label class="label">Username</label>
                                <input class="input--style-4" type="text" name="username" required="yes">
                            </div>
                        </div>

                        <div class="row row-space">
                            <div class="input-group">
                                <label class="label">Password</label>
                                <input class="input--style-4" type="password" name="password" required="yes">
                            </div>
                        </div>
                        
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>

                        <br>

                        <div class="w-full text-center p-t-55">
                            <span class="txt2">
                                Not a Member?
                            </span>

                            <a href="register.php" class="txt2 bo1">
                                Register Here
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->