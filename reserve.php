<?php include 'controllers/authController.php'

?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: loginv.php');
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<script type="text/javascript">
		function tellSuccess(){
			document.getElementById("forTell").innerHTML="Success";
	}
	</script>
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
	<title>Rooftop Restaurant</title>

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
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>

<body>

	<!--================ Start Header Area =================-->
	<header class="header-area">
		<div class="container">
			<div class="header-wrap">
				<div class="header-top d-flex justify-content-between align-items-center navbar-expand-md">
					<div class="col menu-left">
						<a href="index.php">Home</a>
						<a href="reserve.php">Reservation</a>
						<a  href="menu.html">Place Order</a>
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
									<a class="nav-link" href="index.php">Home</a>
								</li>
								<li class="nav-item hide-lg">
									<a class="nav-link" href="reserve.php">Reservation</a>
								</li>
								<li class="nav-item hide-lg">
									<a class="nav-link" href="menu.html">Place order</a>
								</li>
								<!-- Dropdown -->
								<li class="nav-item dropdown">
									<a class="nav-link" href="welcome.php">For Staff</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link" href="about.html">About Us</a>
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
	<section class="home-banner-area relative">
		<div class="container">
			<div class="row height align-items-center justify-content-center">
				<div class="home-banner-content col-lg-5">
					<h1>Reservation</h1>
					<hr>
					<p>A Fine Dinning Restaurant</p>
					<div id="fortell"></div>
					
				</div>
			</div>
		</div>
	</section>
	<!--================ End banner Area =================-->

	<!--================ Left Right And Banner Icon =================-->
	<div class="go-down">
		<a href="#menu_area">
			<img class="go-down-img" src="img/go-down.png" alt="">
		</a>
	</div>
	<div class="fixed-view-menu">
		<p>
			<a href="menu.html">view menu</a>
		</p>
	</div>
	<div class="fixed-book-table">
		<p>
			<a href="reserve.php">book a table</a>
		</p>
	</div>
	<!--================ Left Right And Banner Icon =================-->

	<!--================ Menu Area =================-->
	
	<!--================End Menu Area =================-->

	<!--================ Gallery Area =================-->
	
	<!--================ End Gallery Area =================-->
	<?php
	require_once 'controllers/sendEmails.php';
	//set up connection	
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
//get last rid, prepare new rid, 
$sql = "SELECT count from resCount";
$result = $conn->query($sql);
$row=mysqli_fetch_row($result);
$lastRid=$row[0];
	mysqli_free_result($result);
	$lastRid++;
    $conn->close();
	require_once "config.php";
	$numPeople=$rdate=$rtime=$rphone=$UserEmail="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["num-people"])) || empty(trim($_POST["rdate"]))){
        $username_err = "Please complete the form.";
    } 
    else
    {
    	$numPeople = trim($_POST["num-people"]);
    	$rdate = trim($_POST["rdate"]);
    	$rtime = trim($_POST["rtime"]);
    	$ruserID=$_SESSION['id'];
    	$rphone = trim($_POST["rphone"]);
    	$UserEmail = trim($_POST["remail"]);
    	$rstatus=3;
    	$sql = "INSERT INTO reservations (rid,numPeople,rdate,rtime,userID, phone,email,rstatus) VALUES (?, ?, ?,?, ?, ?,?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssss",$p_rid, $p_numPeople, $p_rdate,$p_rtime,$p_userID,$p_rphone,$p_remail,$p_rstatus);
            
            // Set parameters
            
            $prid= $lastRid;
            $p_numPeople = $numPeople;
            $p_rdate = $rdate;
            $p_rtime=$rtime;
            $p_userID=$ruserID;
            $p_rphone=$rphone;
            $p_remail=$UserEmail;
            $p_rstatus=$rstatus;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                //header("location: register.php");
                //echo "Successfully done.";
            } 
            /*else{
                echo "Something went wrong. Please try again later.";
            }*/
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
        mysqli_close($link);
        sendResEmail($UserEmail,$numPeople,$rdate,$rtime);
    }
}
	?>


	<!--================ Reservation Area =================-->
	<br><br><br>
	<section class="reservation-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7 col-md-6">
					<form class="booking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
						<div class="row">
							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="num-people" placeholder="Num people" onfocus="this.placeholder = ''" onblur="this.placeholder = 'num people'"
								 class="form-control" required="" type="text">
							</div>

							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="rdate" class="form-control datepicker" placeholder="r Date" onfocus="this.placeholder = ''"
								 onblur="this.placeholder = 'r Date'" class="form-control" required="" type="text">
							</div>
							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="rtime" placeholder="rtime" onfocus="this.placeholder = ''" onblur="this.placeholder = 'rtime'"
								 class="form-control" required="" type="text">
							</div>
							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="rphone" placeholder="rphone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'rphone'"
								 class="form-control" required="" type="text">
							</div>
							<div class="col-lg-12 d-flex flex-column mb-20">
								<input name="remail" placeholder="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'email'"
								 class="form-control" required="" type="text">
							</div>

							<div class="col-lg-12 d-flex justify-content-end">
								<button class="primary-btn dark mt-30 text-uppercase" onclick="tellSuccess()">Send Request</button>
							</div>
							<div class="alert-msg"></div>
						</div>
					</form>
				</div>
				<div class="offset-lg-1 col-lg-4 col-md-6">
					<div class="section-title relative">
						<h1>
							Book a <br>
							Table or <br>
							Rooms for <br>
							private <br>
							dining
						</h1>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
							magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!--================End Reservation Area =================-->

	<!--================ Chefs Quotes Area =================-->
	
	<!--================ End Chefs Quotes Area =================-->

	<!--================ Start Call To Action Area =================-->
	
	<!--================ End Call To Action Area =================-->

	<!--================ Contact Area =================-->
	
	<!--================ End Contact Area =================-->

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