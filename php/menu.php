<?php
require_once("../php/include.php")
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Supun Silva">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
    $(document).ready(function() {
      var path = window.location.pathname;
      path = path.replace(/\/$/,"");
      path = decodeURIComponent(path);
      path = path.split("/");
      path = path[2];

      $("#menu li a").removeClass("active");
      $("#"+ path + " a").addClass("active");


      $('#check').bind('change', function () {

         if ($(this).is(':checked')){
          $("#menuicon").removeClass("fa-bars");
          $("#menuicon").addClass("fa-times");
         }
         else {
           $("#menuicon").removeClass("fa-times");
           $("#menuicon").addClass("fa-bars");
         }
          
      });

    });
  </script>
  </head>
  <body>

    <nav>
   <input type="checkbox" id="check" name="check">
   <label for="check" class="checkbtn"> <i id="menuicon" class="fa fa-bars" aria-hidden="true"></i></label>
   <a href="../home"><img src="../img/logo.png" class="responsive_img" width="3000" height="80"></a>

    <ul id="menu">
          <li id="home"><a href="../home">Home</a></li>
          <li id="aboutus"><a href="../aboutus">About us</a></li>
          <li id="searchjobs"><a href="../searchjobs">Search Jobs</a></li>
          <li id="employer"><a href="../employer">Employer</a></li>
          <li id="feedback"><a href="../feedback">Feedback</a></li>
    </ul>
    
    </nav>
    <?php
    $display_login = 'none';
    if(isset($_SESSION['username'])){
      $display_login = 'block';
    }
    ?>
    <span style="z-index: 10000; padding-left: 5px; display: <?php echo $display_login; ?>;">Logged in as <b><?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?></b>
    &nbsp;&nbsp;&nbsp;<a href="../php/logout.php">Logout</a>
    </span>
  </body>
</html>