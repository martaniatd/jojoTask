<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$connect = mysqli_connect("localhost","root","") or die(mysql_error());

    $username = mysqli_real_escape_string($connect,$_POST['username']);
    //cek username
    if(preg_match('/^[a-zA-Z0-9]{6,12}$/', $username)) { 
        $bool = true;
    }else{
        $bool = false;
        Print '<script>alert("Username must be from 6 to 12 characters!")</script>';
    }

    $password = mysqli_real_escape_string($connect,md5($_POST['password']));
    //cek password
    if(preg_match('/^[a-zA-Z0-9]{6,}$/', $password)) { 
        $bool = true;
    }else{
        $bool = false;
        Print '<script>alert("Password must more than or equals to 6 characters!")</script>';
    }
    
    $first_name = mysqli_real_escape_string($connect,$_POST['first_name']);
    $last_name = mysqli_real_escape_string($connect,$_POST['last_name']);
	$bool = true;

    mysqli_select_db($connect,"task_marta") or die("Can't connect to Database");

	$query = mysqli_query($connect,"Select * from users");
	while($row = mysqli_fetch_array($query))
	{
		$table_users = $row['username'];
		if($username == $table_users){
			$bool = false;
			Print '<script>alert("Username has already taken!")</script>';
		}
	}

	if($bool){
		mysqli_query($connect,"INSERT INTO users(username,password,first_name,last_name) VALUES ('$username','$password','$first_name','$last_name')");
        Print '<script>alert("Successfully Registered!")</script>';
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
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">first name</label>
                                    <input class="input--style-4" type="text" name="first_name" required="yes">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">last name</label>
                                    <input class="input--style-4" type="text" name="last_name" required="yes">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Username</label>
                                    <input class="input--style-4" type="username" name="username" required="yes">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" required="yes">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>

                        <br>

                        <div class="w-full text-center p-t-55">
                            <span class="txt2">
                                Have an Account ?
                            </span>

                            <a href="login.php" class="txt2 bo1">
                                Login Here
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

