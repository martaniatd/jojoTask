<?php 
	require_once('config.php');

    $username = $_SESSION['username'];
    $query = mysqli_query($connect,"Select * from users WHERE username='$username'");
    $row = mysqli_fetch_array($query);
    $first_name = $row['first_name'];
	$last_name = $row['last_name'];
?>
<html>
<head>
	<title>Task Marta</title>
	<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- menghubungkan dengan file jquery -->
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div class="content">
	<header>
		<h1 class="judul"><?php echo "Hi, Welcome ". $first_name ?></h1>
	</header>
 
	<div class="menu">
		<ul>
			<li><a href="page.php?page=home">HOME</a></li>
			<li><a href="page.php?page=user">List User</a></li>
			<li><a href="logout.php">LOGOUT</a></li>
		</ul>
	</div>
 
	<div class="badan"> 
		<?php 
			if(isset($_GET['page'])){
				$page = $_GET['page'];
		
				switch ($page) {
					case 'home':
						include "menu/home.php";
						break;
					case 'user':
						include "menu/getlist.php";
						break;
					default:
						echo "<center><h3>Page not Found!</h3></center>";
						break;
				}
			}else{
				include "menu/home.php";
			}
		?>
	</div>
</div>
</body>
</html>