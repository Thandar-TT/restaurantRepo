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
//get last rid
$sql = "SELECT count from resCount";
$result = $conn->query($sql);
$row=mysqli_fetch_row($result);
$lastRid=$row[0];
//echo "old total ".$oldTotal."<br>";
mysqli_free_result($result);
//check any new row
$sql = "SELECT * from reservations where rid>$lastRid";
$result = $conn->query($sql);
$newRowCount=0;
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	//sleep(2);
    	$newRowCount++;
    	echo "numPeople: " . $row["numPeople"]."<br>date: ". $row["rdate"]."<br>";
    }
    mysqli_free_result($result);
    $lastRid+=$newRowCount;
    //update stored value
	$sql = "update resCount set count=$lastRid";
	$result = $conn->query($sql);
	//mysqli_free_result($result);
	$newRowCount=0;
}
/*if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    	sleep(2);
    	echo "name: " . $row["eventName"];
    }
} else {
    echo "0 results";
}*/
$conn->close();
?>