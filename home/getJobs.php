<?php
include ('../php/db.php');
/*
if(!isset($_SESSION['username'])){
	echo "You do not have permission to access this page";
	return false;
}
*/

$smt = $con->prepare("SELECT j.jobTitle, l.location, c.jobCategory, j.salary FROM job j LEFT JOIN locations l ON j.location=l.id LEFT JOIN jobcategory c ON j.category = c.id ORDER BY j.jobTitle LIMIT 10");
$smt->execute(array());
$row=$smt->fetchAll(PDO::FETCH_OBJ);
print json_encode($row);

?>