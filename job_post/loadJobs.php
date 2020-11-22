<?php
include ('../php/db.php');
if(!isset($_SESSION['username'])){
	echo "You do not have permission to access this page";
	return false;
}
$userid = $_SESSION['userid'];

	$smt = $con->prepare("SELECT j.*, c.jobCategory, l.location from job j inner join jobcategory c on j.category = c.id inner join locations l on j.location = l.id WHERE j.employerid=? ORDER BY j.jobTitle LIMIT 10");
	$smt->execute(array($userid));
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	print json_encode($row);
?>