<?php
include ('../php/db.php');
if(!isset($_SESSION['username'])){
	echo "You do not have permission to access this page";
	return false;
}
if(isset($_POST['company']) && isset($_POST['jobTitle'] ))
{
	$company = $_POST['company'];
	$jobTitle = $_POST['jobTitle'];
	$res = $_POST['res'];
	$requ = $_POST['requ'];
	$category = $_POST['category'];
	$location = $_POST['location'];
	$salary = $_POST['salary'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$empid = $_SESSION['userid'];

	$sql = "SELECT * FROM `job` where jobTitle = ?";
	$smt = $con->prepare($sql);
	$smt->execute(array($jobTitle));
	$row = $smt->fetch(PDO::FETCH_OBJ);
	$num_rows = $smt->rowCount();
	if($num_rows != 0){
		echo "Job Title already added. Please change the Job Title and try again. <a href='javascript:history.go(-1)'>Go Back </a>";
		return false;
	}

	$sql = "INSERT INTO job (companyName, jobTitle, responsibility, requirements, category, location, salary, phone, email, employerid) VALUES (?,?,?,?,?,?,?,?,?,?)";
	$smt = $con->prepare($sql);
	$result = $smt->execute(array($company, $jobTitle, $res, $requ, $category, $location, $salary, $phone, $email, $empid));
	if($result == 1) {
		echo "New Job has been added successfully. <a href='../job_post'>Add more jobs here</a>";
		return false;
	}
	echo "Unable to add a new job. Please contact your administrator";
	return false;
}
?>