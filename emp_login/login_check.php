<?php
include ('../php/db.php');

if(isset($_POST['username']) && isset($_POST['password'] ))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);

	$sql = "SELECT * FROM `employer` where BINARY `username`= ? and BINARY `password`= ?";
	$smt = $con->prepare($sql);
	$smt->execute(array($username,$password));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$num_rows = $smt->rowCount();
	

	if($num_rows == 0){
		echo "error";
		return false;
	}

	$sql = "SELECT * FROM jobcategory where id=?";
	$smt = $con->prepare($sql);
	$smt->execute(array($row->businessarea));
	$row2 = $smt->fetch(PDO::FETCH_OBJ);

    if($row->businessstatus == '1'){
		$_SESSION['businessStatus'] = 'Government Sector';
	} else {
		$_SESSION['businessStatus'] = 'Private Sector';
	}
		$_SESSION['username'] = $row->username;
		$_SESSION['userid'] = $row->id;
		$_SESSION['companyName'] = $row->companyname;
		$_SESSION['businessArea'] = $row2->jobCategory;
		$_SESSION['address'] = $row->address;
		$_SESSION['phone'] = $row->phone;
		$_SESSION['email'] = $row->email;
	
		echo 'ok';
		return false;
}
?>