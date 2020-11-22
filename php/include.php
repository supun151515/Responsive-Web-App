<?php
if (session_status() == PHP_SESSION_NONE) {
   ini_set('session.gc_maxlifetime', 288000);
   session_set_cookie_params(28800);
   session_start();
}
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light+Two&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/main.css">
    <link href="../css/alertify.min.css" rel="stylesheet" />


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="../js/alertify.min.js"></script>

    </head>
    <body>

    </body>
</html>