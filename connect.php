<?php
$button='';
if(   isset($_POST['name']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['car']) || isset($_POST['km']) || isset($_POST['days']) || isset($_POST['fromu']) || isset($_POST['till'])) {
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$car=$_POST['car'];
$km=$_POST['km'];
$days=$_POST['days'];
$fromu=$_POST['fromu'];
$till=$_POST['till'];
}
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="fauredb";


$conn=new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error){
	echo "$conn->connect_error";
}
else{
	$stmnt=$conn->prepare("insert into rental(name, email, phone, car, km, days, fromu, till) values(?,?,?,?,?,?,?,?)");
	$stmnt->bind_param("ssssssss", $name, $email, $phone, $car, $km, $days, $fromu, $till);
	$execval = $stmnt->execute();
	echo $execval;

	echo "<h1> Thankyou for renting a car with us"." ".$name.", We will contact you shortly!</h1>";
	echo( "<button onclick= \"location.href='index.html'\">Back to Home</button>");             

	$stmnt->close();
	$conn->close();
	}
?>
