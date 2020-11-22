<?php
include ('../php/db.php');

if(isset($_POST['username']) && isset($_POST['password'] ))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$companyName = $_POST['company'];
	$businessArea = $_POST['businessArea'];
	$businessStatus = $_POST['businessStatus'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	
	$sql = "SELECT * FROM `employer` where BINARY `username`= ?";
	$smt = $con->prepare($sql);
	$smt->execute(array($username));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$num_rows = $smt->rowCount();
	

	if($num_rows != 0){
		//echo "Username already registered. Please change username and try again. <a href='javascript:history.go(-1)'>Go Back </a>";
		echo "exist";
		return false;
	}

	$sql = "INSERT INTO employer (username, password, companyname, businessarea, businessstatus, address, phone, email) VALUES (?,?,?,?,?,?,?,?)";
	$smt = $con->prepare($sql);
	$result = $smt->execute(array($username, md5($password), $companyName, $businessArea, $businessStatus, $address, $phone, $email));
	if($result == 1) {
		echo "ok";
		//echo "Employer registration successfull. <a href='../emp_login'>Please Login here</a>";
		return false;
	}
	//echo "Unable to register. Please contact your administrator";
	echo "error";
	return false;
}
?>