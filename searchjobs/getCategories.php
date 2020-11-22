<?php
include ('../php/db.php');



$smt = $con->prepare("SELECT * from jobCategory ORDER BY jobCategory");
	$smt->execute();
	$row = $smt->fetchAll(PDO::FETCH_OBJ);
	$custom = array('id'=>'0', 'jobCategory' => 'Any Category');
	array_unshift($row, $custom);
	print json_encode($row);
?>