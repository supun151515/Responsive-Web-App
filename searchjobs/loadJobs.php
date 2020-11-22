<?php
include ('../php/db.php');

$jobTitle = '%'.$_POST['jobTitle'].'%';
$category = $_POST['category'];
$location = $_POST['location'];

$sql = "SELECT j.*, l.location, c.jobCategory from job j LEFT JOIN locations l ON j.location=l.id LEFT JOIN jobcategory c ON j.category = c.id WHERE j.jobTitle LIKE :jobTitle AND j.location = IF(:location = '0', j.location, :location) AND j.category = IF(:category = '0', j.category, :category)";


$smt = $con->prepare($sql);
$params = [
':jobTitle' => $jobTitle,
':location' => $location,
':category' => $category];
	$smt->execute($params);
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	print json_encode($row);
?>