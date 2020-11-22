<?php
    require_once("../php/menu.php")
    ?>
<!DOCTYPE html>
<html>
<head>
        <title>Feedback</title>
        <link rel="stylesheet" href="index.css">
<script>
function validate(){
  var patt_phone = /^[0][0-9]{9,12}$/;
  var patt_email = /^([a-zA-Z0-9._%+-])+@([a-zA-Z0-9.-]+\.)+(my|com|net)$/;
  var uname = $("#uname").val();
  var des = $("#des").val();
  var email = $("#email").val();
  var mobile = $("#mobile").val();

  if(!patt_email.test(email)) {
    alert("Invalid Email. Must contain only one @ and .my, .net or .com");
    return false;
  }

  if(uname == '' || des == '' || email =='' || mobile =='') {
    alert("Please fill all the fields");
    return false;
  }
  if(!patt_email.test(email)) {
    alert("Invalid Email. Must contain only one @ and .my, .net or .com");
    return false;
  }
  if(!patt_phone.test(mobile)) {
    alert("Invalid Phone. Must contain 10-12 digits. Ex: 028xxxxxxx");
    $("#mobile").focus();
    return false;
    }
   
}
</script>
</head>
    <body>

<div class="object one">
<p class="s2">Getting touch with us</p>
<p class="s3">If you have any immediate inquiry you may email to supun151515@gmail.com</p>
<p class="s3">You are welcome to fill our feedback form where we can be touch with you always. By sharing your email address and mobile number, you are agreed to receive our newsletters and event updates via email and sms.</p>
</div>

<br>
<br>
<br>

<div class="col-12">
<form name="myform" id="myform" method="post" action="feedback.php" onsubmit="return validate();">
<table class="textpadding">
<tr>

<td>Your Name</td>
<td><input type="text" size="20" id="uname" name="uname"></td>
</tr>
<tr>
<td>Your status</td>
<td><select name="status" id="status">
  <option value="Empoyer">Empoyer</option>
  <option value="Job Seeker">Job Seeker</option>
</select></td>
</tr>

<tr>
<td>Feedback category</td>
<td><select name="feedCat" id="feedCat">
  <option value="Jobs">Jobs</option>
  <option value="Profile">Profile</option>
  <option value="Information">Information</option>
  <option value="Privacy Policy">Privacy Policy</option>
  <option value="Sales">Sales</option>
  <option value="Marketing">Marketing</option>
  <option value="Accounts">Accounts</option>
  <option value="Admin">Admin</option>
</select></td>
</tr>

<tr>
<td>Description</td>
<td><textarea rows="5" id="des" name="des"></textarea>
</td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" id="email" name="email"></td>
</tr>

<tr>
<td>Mobile number</td>
<td><input type="text" id="mobile" name="mobile"></td>
</tr>

<tr>
<td><input class="sendData" type="submit" value="Submit" id="sendData"></td>
<td><input type="reset" value="Clear" id="clearData"></td>
</tr>
</table>
</form>
</div>
<div class="col-12 feedbackend">
When you visit/surf our website, certain personal information about you such as your IP Address, etc. may be automatically stored with us. However, if you choose to avail of certain services on our website, you shall be required to provide certain personal information for the registration and/or access to such services/web pages. Such information may include, without limitation, your name, email address, contact address, mobile/telephone number(s), sex, age, occupation, interests, credit card information, billing information, financial information, content, IP address, standard web log information, information about your computer hardware and software and such other information as may be required for your interaction with the services and from which your identity is discernible. We may also collect demographic information that is not unique to you such as code, preferences, favorites, etc. Further, sometimes you may be asked to provide descriptive, cultural, preferential and social & life style information. In addition to the above we may indirectly also collect information about you when you use certain third party services available on our website. We may also collect certain information about the use of our website by you, such as the services you access/use or areas you visit.
</div>
<?php
require_once("../php/footer.php")
?>
