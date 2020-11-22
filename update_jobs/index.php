<?php
    require_once("../php/menu.php");
    require_once("../php/session2.php");
    ?>

<script>
$(document).ready(function(){

loadLocations();
loadCategories();
loadJobs();

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
 	 myjobs = $.parseJSON(data);
 	$.each(myJobs, function(i,v){
 		$('#jobsTable tr:last').after('<tr><td>'+v.jobTitle+'</td><td>fdgfdgfd</td><td></td><td></td></tr>');
	});
 });
}
</script>
<link rel="stylesheet" href="index.css">

<title>Edit jobs</title>
<div class="row">

<div class="col-12 center h1">
Edit jobs
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
<?php echo $_SESSION['phoneNumber']; ?>
</p>
<p class="p2">
<?php echo $_SESSION['email']; ?>
</p>
</div>
</div>
<div class="col-5">
<form>
<table class="textpadding">
<tr>

<td>Company Name</td>
<td><input type="text" size="20" id="companyName" value="<?php echo $_SESSION['companyName']; ?>"></td>
</tr>
<tr>
<td>Job Title</td>
<td><input type="text" id="jobTitle"></td>
</tr>

<tr>
<td style="vertical-align: top;">Responsibilities</td>
<td><textarea id="res" rows="5"></textarea> </td>
</tr>
<tr>
<td style="vertical-align: top;">Requirements</td>
<td><textarea id="requ" rows="5"></textarea></td>
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
<td><input type="text" id="salary"></td>
</tr>
<tr>
<td>Contact number</td>
<td><input type="text" size="20" id="contactNumber"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" size="20" id="email"></td>
</tr>
<tr>
<td><input type="submit" value="Update Job"></td>
<td><input type="reset" value="Delete job"></td>
</tr>
</table>
</form>
</div>
<div class="col-4 mycenter1">
<img class="emp_register" src="../img/editjobs.jpg">
</div>


</div>
<br>
<br>

<div class="col-12 mytext">
My posted jobs
</div>
<br>
<br>
<div class="col-12">
<table class="paleBlueRows" id="jobsTable">
<tbody>
<tr>
<td>Project Manager</td>
<td>Address</td>
<td>Salary</td>
<td><a href="#" class="myButton">Edit</a>&nbsp;<a href="#" class="myButton2">Delete</a></td>
</tr>
<tr>
<td>cell1_2</td>
<td>cell2_2</td>
<td>cell3_2</td>
<td>cell4_2</td>
</tr>
<tr>
<td>cell1_3</td>
<td>cell2_3</td>
<td>cell3_3</td>
<td>cell4_3</td>
</tr>
<tr>
<td>cell1_4</td>
<td>cell2_4</td>
<td>cell3_4</td>
<td>cell4_4</td>
</tr>
<tr>
<td>cell1_5</td>
<td>cell2_5</td>
<td>cell3_5</td>
<td>cell4_5</td>
</tr>
</tbody>
</table>
</div>
<?php
require_once("../php/footer.php")
?>
</body>
</html>