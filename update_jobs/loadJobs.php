<?php
include ('../php/db.php');
if(!isset($_SESSION['username'])){
	echo "You do not have permission to access this page";
	return false;
}
$userid = $_SESSION['userid'];

	$smt = $con->prepare("SELECT * from jobs WHERE empid=? ORDER BY jobTitle");
	$smt->execute(array($userid));
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	print json_encode($row);
?>