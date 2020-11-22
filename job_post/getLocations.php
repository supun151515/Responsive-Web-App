<?php
include ('../php/db.php');



$smt = $con->prepare("SELECT * from locations ORDER BY location");
	$smt->execute();
	$row = $smt->fetchAll(PDO::FETCH_OBJ);

	//$custom = array('id'=>'0', 'location' => 'Any Location');
	//array_unshift($row, $custom);
	print json_encode($row);
?>