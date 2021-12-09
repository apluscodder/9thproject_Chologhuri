<?php
//book section start//
$placename= $_POST['placename'];
$NumberofGuests = $_POST['NumberofGuests'];
$Arriveldate= $_POST['Arriveldate'];
$LeavingDate= $_POST['LeavingDate'];

$email = $_POST['email'];
$password = $_POST['password'];


$conn = new mysqli('localhost','root','', 'chologhuri');
if($conn->connect_error)
{
	die("Connection Failed".$conn->connect_error);

}

else
{
	$stmt = $conn->prepare("INSERT INTO  book(placename,NumberofGuests,Arriveldate,LeavingDate) VALUES(?,?,?,?)");
	$stmt->bind_param("siss",$placename,$NumberofGuests,$Arriveldate,$LeavingDate);
	$stmt->execute();
	$stmt->store_result();
	echo "successfullay store data";
	$stmt->close();
	

	$stmt1 = $conn->prepare("INSERT INTO login(email,password)VALUES(?,?)");
	$stmt1->bind_param("ss",$email,$password);
	$stmt1->execute();
	$stmt1->store_result();
	echo "Login information successfullay store";
	$stmt1->close();
	$conn->close();

}
//book section end//




?>