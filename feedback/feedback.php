<?php
include ('../php/db.php');

if(isset($_POST['uname']))
{
	$uname = $_POST['uname'];
	$status = $_POST['status'];
	$feedCat = $_POST['feedCat'];
	$des = $_POST['des'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	
	$sql = "INSERT INTO feedback (uname, status, feedbackcat, des, email, phone) VALUES (?,?,?,?,?,?)";
	$smt = $con->prepare($sql);
	$result = $smt->execute(array($uname, $status, $feedCat, $des, $email, $mobile));
	if($result == 1) {
		echo "Feedback has been sent successfully. <a href='../home'>Go back to Home</a>";
		return false;
	}
	echo "Unable to send feedback. Please contact your administrator";
	return false;
}
?>