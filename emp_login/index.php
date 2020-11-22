<?php
    require_once("../php/menu.php");
    require_once("../php/session.php");
    ?>

<link rel="stylesheet" href="index.css">
<title>Login</title>
<script>
$(document).ready(function(){
$("#login-form").submit(function(e){
    return false;
});
$("#username").keyup(function(e){
  if (e.which == 13){
    $("#password").focus();  
  }
});

$("#password").keydown(function(e){
  if (e.which == 13){
   // $('#login-form').submit();
  }
})

}); // doc ready end


function Login_Data(){
 var uname = $("#username").val();
 var pass = $("#password").val();
 $.post("login_check.php",{ username: uname, password: pass},
      function(data) {
        if(data == 'ok'){
          location.reload();
        }else{
          alert("Invalid username or password");
          return false;
        }
      });
}
</script>

<div class="row">
<div class="col-12 center h1">
Employer Login
</div>
<br>
<hr />
<div class="col-12">
<br>
</div>

<div class="col-4 mycenter1">
<img class="emp_register" src="../img/login.png">
</div>
<div class="col-5">
<form id="login-form" target="temp" onsubmit="Login_Data();">
<table class="textpadding">
<tr>
<td>Username/Email</td>
<td><input type="text" size="20" id="username"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" size="20" id="password"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Login" id="login"></td>

</tr>
</table>
</form>
</div>
<div class="col-3 mycenter">
Not yet registered with us? <b><a href="../employer">Visit Employer Registration </a></b> to register your company. You can post jobs, edit and delete. 
</div>


</div>


<?php
require_once("../php/footer.php")
?>
</body>
</html>