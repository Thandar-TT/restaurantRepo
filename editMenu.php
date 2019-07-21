<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Menu</title>

	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i|Roboto:400,500" rel="stylesheet">
	<!--
			CSS
			============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/availability-calendar.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!--================ Start Header Area =================-->
	<header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-md">
                    <div class="col menu-left">
                        <a href="editMenu.php">Edit Menu</a>
                        <a href="allRes.php">Reservations</a>
                        <a href="allOrd.php">Orders</a>
                    </div>
                    <div class="col-3 logo">
                        <a href="index.php"><img class="mx-auto" src="img/logo.png" alt=""></a>
                    </div>
                    <nav class="col navbar navbar-expand-md justify-content-end">

                        <!-- Toggler/collapsibe Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                            <span class="lnr lnr-menu"></span>
                        </button>

                        <!-- Navbar links -->
                        <div class="collapse navbar-collapse menu-right" id="collapsibleNavbar">
                            <ul class="navbar-nav justify-content-center w-100">
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="editMenu.php">Edit Menu</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="allRes.php">All Reservations</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="allOrd.php">All Orders</a>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="genRep.php">Generate Report</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Sign Out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="reset.php">Reset Password</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
	<!--================ End Header Area =================-->

	<!--================ Start banner Area =================-->
	<section class="banner-area relative">
		<div class="container">
			<div class="row height align-items-center justify-content-center">
				<div class="banner-content col-lg-5">
					<h1>Edit Menu Status</h1>
					<hr>
					<div class="breadcrmb">
						<p>
							<a href="welcome.php">Staff</a>
							<span class="lnr lnr-arrow-right"></span>
							<a href="#">Edit Menu</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================ End banner Area =================-->

	<!--================ Menu Area =================-->
	<section class="menu-area" id="menu_area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-5 col-md-5">
					<div class="section-title relative">
						<h1>
							Edit Menu<br>
							Status<br>
						</h1>
							<form class="booking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="row">
							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="idInput" placeholder="Menu ID" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Menu ID'"
								 class="form-control" required="" type="text">
							</div>

							<div class="col-lg-12 d-flex flex-column mb-20">
								<!--<div class="nice-select app-select form-control " tabindex="0">-->
									<!---
									<span class="current">Status</span>
									<ul class="list">
										<li data-value="1" class="option">Available</li>
										<li data-value="2" class="option">Suspended</li>
										<li data-value="3" class="option">Not available</li>
									</ul> 
									-------->
									<select  name="status">
<option class="option" value="No Payment Options Selected">[Choose Option Below]</option>
<option class="option" value="Available">Available</option>
<option class="option" value="Suspended">Suspended</option>
<option class="option" value="Unavailable">Unavailable</option>
</select>
									
								<!--</div>-->
							</div>

							<div class="col-lg-12 d-flex justify-content-end">
								<button class="primary-btn dark mt-30 text-uppercase" type="submit">Submit</button>
							</div>
							<div class="alert-msg"></div>
						</div>
					</form>
						
					</div>
				</div>
				<div class="col-lg-7 col-md-7">
					<div class="menu-list">
						<div class="single-menu">
							<h3>Menu Details</h3>
							<div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                	<div class="col-lg-6 d-flex flex-column mb-20">
								<div class="nice-select app-select form-control " tabindex="0">
									<span class="current">Sort by</span>
									<ul class="list">
										<li data-value="1" class="option">Date</li>
										<li data-value="2" class="option">Email</li>
										<li data-value="3" class="option">Duration</li>
									</ul>
								</div>
							</div>
                    <table cellspacing="0" border="1" style="width:35em;height: 20em;">
                        <tr>
                        <th>Menu ID</th>
                        <th>Name</th>
                        <th>Price($)</th>
                        <th>Status</th>
                    </tr>

                    
                    <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cpo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	echo "something";
	$id_input= trim($_POST["idInput"]);
    	$mstatus = $_POST["status"];
	$sql = "update menu set mStatus='$mstatus' where mid='$id_input'";
	

		//$conn->query($sql);
		if ($conn->query($sql) === TRUE) 
		{
    		echo "New record created successfully";
		} 
		else 
		{
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
}




    	$sql = "SELECT * from menu";
    	$result = $conn->query($sql);
	
    	if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["mid"] . "</td><td>". $row["mName"]."</td><td>".$row["mPrice"]."</td><td>".$row["mStatus"]."</td></tr>";
    
}
    }

 else {
    echo "0 results";
}

$conn->close();
?>
</table>
<div id="messages"></div>
                </div>
                
            </div>
        </div>
						</div>

						
				</div>
			</div>
		</div>
	</section>
	<!--================End Menu Area =================-->

	<!--================ Chefs Quotes Area =================-->
	
	<!--================ End Call To Action Area =================-->

	<!--================ Start Footer Area =================-->
	<footer class="footer-area section-gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Top Products</h4>
						<ul>
							<li><a href="#">Managed Website</a></li>
							<li><a href="#">Manage Reputation</a></li>
							<li><a href="#">Power Tools</a></li>
							<li><a href="#">Marketing Service</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Quick links</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Features</h4>
						<ul>
							<li><a href="#">Jobs</a></li>
							<li><a href="#">Brand Assets</a></li>
							<li><a href="#">Investor Relations</a></li>
							<li><a href="#">Terms of Service</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Resources</h4>
						<ul>
							<li><a href="#">Guides</a></li>
							<li><a href="#">Research</a></li>
							<li><a href="#">Experts</a></li>
							<li><a href="#">Agencies</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h4>Newsletter</h4>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get">
								<div class="input-group">
									<input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''"
									 onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
											<span class="lnr lnr-arrow-right"></span>
										</button>
									</div>
									<div class="info"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom row align-items-center justify-content-between">
				<p class="footer-text m-0 col-lg-6 col-md-12">Copyright © 2018 All rights reserved | This template is made with
					<span class="lnr lnr-heart"></span> by <a href="#">Colorlib</a></p>
				<div class="col-lg-6 col-sm-12 footer-social">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-dribbble"></i></a>
					<a href="#"><i class="fa fa-behance"></i></a>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End Footer Area =================-->

	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/parallax.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/main.js"></script>
</body>

</html>