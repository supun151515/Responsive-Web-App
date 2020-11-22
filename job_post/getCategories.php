<?php
include ('../php/db.php');



$smt = $con->prepare("SELECT * from jobCategory ORDER BY jobCategory");
	$smt->execute();
	$row = $smt->fetchAll(PDO::FETCH_OBJ);

	print json_encode($row);
?>