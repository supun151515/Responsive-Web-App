<?php
    require_once("../php/menu.php");
    require_once("../php/session2.php");
    ?>

<script>

function validate(){

  var patt_company = /^[a-zA-Z]+[ ]*[a-z]+$/i;
  var patt_phone = /^[0][0-9]{9,12}$/;
  var patt_email = /^([a-zA-Z0-9._%+-])+@([a-zA-Z0-9.-]+\.)+(my|com|net)$/;
  //var patt_email = /^\w+@[a-zA-Z_]+?\.[com|my|net]{2,3}$/; 
  //var patt_salary = /^[0-9][,.]$/;
  var patt_salary = /^(?!,$)[\d.]+$/;
  var company= $("#company").val();
  var jobTitle = $("#jobTitle").val();
  var res = $("#res").val();
  var requ = $("#requ").val();
  var salary = $("#salary").val();
  var email = $("#email").val();
  var location = $("#location option:selected").val();
  var category = $("#category option:selected").val();
  var phone = $("#phone").val();

   if(res == '') {
    alert("Please type Responsibility");
    return false;
  }
  if(requ == '') {
    alert("Please type Requirements");
    return false;
  }
   if(location == '0'){
    alert("Please select a location");
    return false;
  }
  if(category == '0'){
    alert("Please select a category");
    return false;
  }
  if(!patt_email.test(email)) {
    alert("Invalid Email. Must contain only one @ and .my, .net or .com");
    return false;
  }
  if(!patt_company.test(company)){
    alert("Invalid Company Name");
    return false;
  }
  if(!patt_company.test(jobTitle)){
    alert("Invalid Job Title");
    return false;
  }
 
  if(!patt_salary.test(salary)){
    alert("Invalid Salary, must be only numerical value");
    return false;
  }
  if(!patt_phone.test(phone)) {
    alert("Invalid Phone. Must contain 10-12 digits. Ex: 028xxxxxxx");
    return false;
    }
 
}
$(document).ready(function(){

loadLocations();
loadCategories();
loadJobs();
$(document).on('click','.jobsdiv', function(){
/*
  var cssdisplay = $(this).find('.detail').css("display");
  if(cssdisplay == 'none'){
    $(this).find('.detail').css("display","block");
  }else{
    $(this).find('.detail').css("display","none");
  }
  */
  $(this).find('.detail').toggle(function(){
    $(this).animate({'display': 'block'}, 100);
}, function(){
    $(this).animate({'display': 'none'}, 100);
});


});

});
function loadLocations(){
 $.post("getLocations.php", function(data) {
 	var myLocations = $.parseJSON(data);
 	$.each(myLocations, function(i,v){
 		$('#location').append($('<option>', {
    	value: v.id,
    	text: v.location
	}));
 	});
 	
 });
}
function loadCategories(){
 $.post("getCategories.php", function(data) {
 	var myCategories = $.parseJSON(data);
 	$.each(myCategories, function(i,v){
 		$('#category').append($('<option>', {
    	value: v.id,
    	text: v.jobCategory
	}));
 	});
 	
 });
}

var myJobs = 0;
function loadJobs(){
 $.post("loadJobs.php", function(data) {
 	myJobs = $.parseJSON(data);
 	$.each(myJobs, function(i,v){
 		$('.joblist').append('<div class="jobsdiv"><div class="jobtitle">'+ v.jobTitle +'</div><div class="jobcat">Category: ' + v.jobCategory + ' &nbsp;&nbsp;&nbsp; Location: ' + v.location + ' &nbsp;&nbsp;&nbsp; Salary: $'+v.salary+' &nbsp;&nbsp;&nbsp;<a href="../update_jobs/index.php?id='+v.id+'" target="_blank" class="myButton">Edit</a>&nbsp;&nbsp;&nbsp;<a id="deletejob" href="#" class="myButton2" data-val="'+v.id+'">Delete</a></div><br><br><div class="detail"><p style="white-space:pre;"><b>Responsibilities:</b><br> '+v.responsibility+'</p><p style="white-space:pre;"><b>Requirements: </b><br>'+v.requirements+'</p></div></div>');
	});
 });
}
</script>
<link rel="stylesheet" href="index.css">

<title>Add Delete jobs</title>
<div class="row">

<div class="col-12 center h1">
Add and Remove jobs
</div>
<br>
<hr />
<div class="col-12">
<br>
</div>
<div class="col-3 mycenter">
<p>Welcome <?php echo $_SESSION['username']; ?>,  <b><a href="../php/logout.php">Logout</a></b></p>
<div class="hideonmobile">
<p class="p1">
<?php echo $_SESSION['companyName']; ?>
</p>
<p>
<?php echo $_SESSION['businessArea']; ?>
</p>
<p>
<?php echo $_SESSION['businessStatus']; ?>
</p>
<p class="p2">
<?php echo $_SESSION['address']; ?>
</p>
<p class="p2">
<?php echo $_SESSION['phone']; ?>
</p>
<p class="p2">
<?php echo $_SESSION['email']; ?>
</p>
</div>
</div>
<div class="col-5">
<form name="myform" id="myform" method="post" action="addjobs.php" onsubmit="return validate();">
<table class="textpadding">
<tr>

<td>Company Name</td>
<td><input type="text" size="20" id="company" name="company" value="<?php echo $_SESSION['companyName']; ?>"></td>
</tr>
<tr>
<td>Job Title</td>
<td><input type="text" id="jobTitle" name="jobTitle"></td>
</tr>

<tr>
<td style="vertical-align: top;">Responsibilities</td>
<td><textarea id="res" name="res" rows="5" cols="20"></textarea> </td>
</tr>
<tr>
<td style="vertical-align: top;">Requirements</td>
<td><textarea id="requ" name="requ" rows="5"></textarea></td>
</tr>
<tr>
<td>Job Category</td>
<td><select name="category" id="category">
  <option value="0">--Select--</option>
</select>
</td>
</tr>

<tr>
<td>Location</td>
<td><select name="location" id="location">
  <option value="0">--Select--</option>
</select></td>
</tr>

<tr>
<td>Salary</td>
<td><input type="text" id="salary" name="salary"></td>
</tr>
<tr>
<td>Contact number</td>
<td><input type="text" size="20" id="phone" name="phone"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" size="20" id="email" name="email"></td>
</tr>
<tr>
<td><input type="submit" value="Add Job"></td>
<td><input type="reset" value="Clear"></td>
</tr>
</table>
</form>
</div>
<div class="col-4 mycenter1">
<img class="emp_register" src="../img/addjobs.jpg">
</div>


</div>
<br>
<br>

<div class="col-12 mytext">
My posted jobs
</div>
<br>
<br>
<div class="col-12 joblist">

</div>
<?php
require_once("../php/footer.php")
?>
</body>
</html>