<?php
    require_once("../php/menu.php");
    require_once("../php/session.php");
    ?>

<link rel="stylesheet" href="index.css">

<script>
function validate(){
	var patt_company = /^[a-zA-Z]+[ ]*[a-z]+$/i;
  var patt_phone = /^[0][0-9]{9,12}$/;
  var patt_email = /^([a-zA-Z0-9._%+-])+@([a-zA-Z0-9.-]+\.)+(my|com|net)$/;
  //var patt_email = /^\w+@[a-zA-Z_]+?\.[com|my|net]{2,3}$/; 
  //const patt_company = new RegExp('^[a-zA-Z]+[ ]*[a-z]+$i');
	var username = $("#username").val();
  var password = $("#password").val();
  var company= $("#company").val();
  var address = $("#address").val();
  var phone = $("#phone").val();
  var email = $("#email").val();
  var businessArea = $("#businessArea option:selected").val();
  if(username.length < 6){
    alert("Username must contain atleast 6 characters");
    return false;
  }
    if(password.length < 6){
    alert("Password must contain atleast 6 characters");
    return false;
  }
    if(!patt_company.test(company)){
    alert("Invalid Company Name");
    return false;
    }
    if(businessArea == '0'){
      alert("Please select a Business Area");
      return false;
    }
    if(address == '') {
    alert("Please type a address");
    return false;
    }
    if(!patt_phone.test(phone)) {
    alert("Invalid Phone. Must contain 10-12 digits. Ex: 028xxxxxxx");
    return false;
    }
   if(!patt_email.test(email)) {
    alert("Invalid Email. Must contain only one @ and .my, .net or .com");
    return false;
  }

   $.ajax({
    type: 'POST',
    url: 'register.php',
    data: $('#myform').serialize(),
    success: function (response) {
      if(response == 'ok'){
        alertify.alert("Success", "Employer registration successfull. You can now login o the system", function(){
          document.location.href = '../emp_login';
        });
      }else if(response == 'error'){
        alertify.alert("Error", "Something goes wrong. Please check with your system administrator");
        return false;
      }else if(response == 'exist'){
        alertify.alert("Username exist", "Username already exist in the system. Please try another one");
        $("#username").focus();
        return false;
      }
    },
  });

}

function loadCategories(){
 $.post("../job_post/getCategories.php", function(data) {
  var myCategories = $.parseJSON(data);
  $.each(myCategories, function(i,v){
    $('#businessArea').append($('<option>', {
      value: v.id,
      text: v.jobCategory
  }));
  });
  
 });
}

$(document).ready(function() {
loadCategories();

$("#myform").submit(function(e){
    e.preventDefault();
  });
 
});

</script>
<div class="row">
<div class="col-12 center h1">
Employer Registration
</div>
<br>
<hr />
<div class="col-12">
<br>
</div>

<div class="col-4 mycenter1">
<img class="emp_register" src="../img/emp_register.jpg">
</div>
<div class="col-5">
<form name="myform" id="myform" method="post" action="" onsubmit="return validate();">
<table class="textpadding">
<tr>

<td>Username</td>
<td><input id="username" name="username" type="text" size="20"></td>
</tr>
<tr>
<td>Password</td>
<td><input id="password" name="password" type="password"></td>
</tr>

<tr>
<td>Company Name</td>
<td><input id="company" name="company" type="text" size="20"></td>
</tr>

<tr>
<td>Business area </td>
<td>
<select name="businessArea" id="businessArea">
<option value="0">--Select--</option>
</select>
</td>
</tr>

<tr>
<td>Business status</td>
<td><select name="businessStatus" id="businessStatus">
  <option value="1">Government Sector</option>
  <option value="2">Private Sector</option>
</select></td>
</tr>
<tr>
<td>Address</td>
<td><textarea id="address" name="address" rows="5" cols="25"></textarea></td>
</tr>
<tr>
<td>Phone number</td>
<td><input type="text" id="phone" name="phone"></td>
</tr>

<tr>
<td>Email address</td>
<td><input type="text" id="email" name="email"></td>
</tr>

<tr>
<td><input type="submit" value="Register"></td>
<td><input type="reset" value="Clear"></td>
</tr>
</table>
</form>
</div>
<div class="col-3 mycenter">
Already registered? <b><a href="../emp_login">Login here</a></b> to access your portal. You can post jobs, edit and delete. 
</div>


</div>

<div class="col-12 mytext">
If you choose to provide us with the above mentioned information, you consent to the use, transfer, processing and storage of the information so provided by you on our servers. The information provided by you shall not be given to third parties (third parties for this purpose do not include our group / holding / subsidiary companies and or our service partners / associates) for marketing purposes and other related activities without your prior consent. Though if you choose to make your profile visible, all information pertaining to your profile will be visible to third parties.
</div>
<?php
require_once("../php/footer.php")
?>
</body>
</html>