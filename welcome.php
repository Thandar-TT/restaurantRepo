<?php include 'controllers/authController.php'?>
<?php
// redirect user to login page if they're not logged in
if (empty($_SESSION['id'])) {
    header('location: loginv.php');
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <style type="text/css">
        th { text-align: center; background-color: #999; }
        th, td { padding: 0.4em; text-align: center;} 
        tr.alt td { background: #ddd; } 

        
        .bg{
            background: #999;
        }
    </style>
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript" charset="utf-8">
    function addmsg(msg){
        /* Simple helper to add a div.
        type is the name of a CSS class (old/new/error).
        msg is the contents of the div */
        $("#messages").append(
            "<div>"+ msg +"</div>"
        );
    }

    function waitForMsg(){
        /* This requests the url "msgsrv.php"
        When it complete (or errors)*/
        $.ajax({
            type: "GET",
            url: "msgsrv.php",

            async: true, /* If set to non-async, browser shows page as "Loading.."*/
            cache: false,
            timeout:50000, /* Timeout in ms */

            success: function(data){ /* called when request to barge.php completes */
                addmsg(data); /* Add response to a .msg div (with the "new" class)*/
                setTimeout(
                    waitForMsg, /* Request next message */
                    1000 /* ..after 1 seconds */
                );
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                addmsg(textStatus + " (" + errorThrown + ")");
                setTimeout(
                    waitForMsg, /* Try again after.. */
                    15000); /* milliseconds (15seconds) */
            }
        });
    };

    $(document).ready(function(){
        waitForMsg(); /* Start the inital request */
    });
    </script>
</head>

<body>

    <!--================ Start Header Area =================-->
    <header class="header-area">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center navbar-expand-md">
                    <div class="col menu-left">
                        <a class="active" href="index.html">Home</a>
                        <a href="menu.html">Reservation</a>
                        <a href="about.html">Place order</a>
                    </div>
                    <div class="col-3 logo">
                        <a href="index.html"><img class="mx-auto" src="img/logo.png" alt=""></a>
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
                                    <a class="nav-link" href="index.html">Home</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="menu.html">Reservation</a>
                                </li>
                                <li class="nav-item hide-lg">
                                    <a class="nav-link" href="about.html">Place order</a>
                                </li>
                                <!-- Dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="register.php">Register</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="gallery.html">Gallery</a>
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
                    <h1>Admin's Control Panel</h1>
                    <hr>
                    <p>Reservations and Orders Details</p>

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
            <a href="index.html">book a table</a>
        </p>
    </div>
    <!--================ Left Right And Banner Icon =================-->

    <!--================ Menu Area =================-->
    
    <!--================End Menu Area =================-->

    <!--================ Gallery Area =================-->
    
    <!--================ End Gallery Area =================-->
<br><br><br>
    <!--================ Reservation Area =================-->
    <section class="reservation-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <table cellspacing="0" border="1" style="width:35em;height: 20em;">
                        <tr>
                        <th>People</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>User name</th>
                        <th>Phone</th>
                    </tr>

                    
                    <?php
//if(rand(1,3) == 1){
    /* Fake an error */
    //header("HTTP/1.0 404 Not Found");
    //die();
//}

/* Send a string after a random number of seconds (2-10) */
//sleep(rand(2,3));
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

$sql = "SELECT * from reservations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["numPeople"] . "</td><td>". $row["rdate"]."</td><td>".$row["rdate"]."</td><td>".$row["rdate"]."</td><td>".$row["rdate"]."</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>
<div id="messages"></div>
                </div>
                <div class="offset-lg-1 col-lg-4 col-md-6">
                    <div class="section-title relative">
                        <h1>
                            Reservations<br>
                            that <br>
                            Customers <br>
                            made 
                            
                        </h1>
                        <p>
                            View details of reservations in real time with table here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Reservation Area =================-->
<br><br><br><br>
    <!--================Start order table Area =================-->
    <section class="reservation-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <table cellspacing="0" border="1" style="width:35em;height: 20em;">
                        <tr>
                        <th>Order ID</th>
                        <th>Menu Item</th>
                        <th>Date</th>
                        <th>Count</th>
                        <th>Address</th>
                        <th>Instructions</th>
                        
                    </tr>

                    
                    <?php
//if(rand(1,3) == 1){
    /* Fake an error */
    //header("HTTP/1.0 404 Not Found");
    //die();
//}

/* Send a string after a random number of seconds (2-10) */
//sleep(rand(2,3));
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

$sql = "SELECT * from reserve";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["eventName"] . "</td><td>". $row["eventdate"]."</td><td>".$row["eventName"]."</td><td>".$row["eventdate"]."</td><td>".$row["eventdate"]."</td><td>".$row["eventdate"]."</td></tr>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</table>
<div id="messages"></div>
                </div>
                <div class="offset-lg-1 col-lg-4 col-md-6">
                    <div class="section-title relative">
                        <h1>
                            Orders<br>
                            that <br>
                            Customers <br>
                            place 
                            
                        </h1>
                        <p>
                            View details of orders in real time with table here.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br><br><br>
    <!--================End order table =================-->

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