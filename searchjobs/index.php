<?php
    require_once("../php/menu.php")
    ?>

<link rel="stylesheet" href="index.css">
<title>Search Jobs</title>
<script type="text/javascript">

function validate(){
  var jobTitle = $("#jobTitle").val();
  var spec = $("#category option:selected").val();
  var location = $("#location option:selected").val();
  if(jobTitle == '' || spec == '' || location =='') {
    alert("Please fill all the fields");
    return false;
  }


    $.ajax({
    type: 'POST',
    url: 'loadJobs.php',
    data: $('#myform').serialize(),
    success: function (response) {
      var myjson = $.parseJSON(response);
      if(myjson.length == 0){
        alertify.alert("No Records", "No search result found");
        $(".joblist").empty();
      }
      $(".joblist").empty();
      $.each(myjson, function(i,v){
        $('.joblist').append('<div class="jobsdiv"><div class="jobtitle">'+ v.jobTitle +'</div><div class="jobcat">Category: ' + v.jobCategory + ' &nbsp;&nbsp;&nbsp; Location: ' + v.location + ' &nbsp;&nbsp;&nbsp; Salary: $'+v.salary+'</div><br><br><div class="detail"><p style="white-space:pre;"><b>Responsibilities:</b><br> '+v.responsibility+'</p><p style="white-space:pre;"><b>Requirements: </b><br>'+v.requirements+'</p></div></div>');
      });

    },
  });
}

$(document).ready(function() {
    
    loadLocations();
    loadCategories();

    $("#myform").submit(function(e){
    e.preventDefault();
  });

 $(document).on('click','.jobsdiv', function(){

    $(this).find('.detail').toggle(function(){
      $(this).animate({'display': 'block'}, 100);
  }, function(){
      $(this).animate({'display': 'none'}, 100);
  });
}); 


var pathname = window.location.pathname;
var url      = window.location.href;
 
try{
var pieces = url.split("?");
var pieces = pieces[1];
pieces = pieces.split("&");

var jobTitle = pieces[0];
var location = pieces[1];
var category = pieces[2];

jobTitle = jobTitle.split("=");
jobTitle = jobTitle[1];
jobTitle = jobTitle.replace("%20", " ");
if(jobTitle == ''){
  jobTitle = ' ';
}

location = location.split("=");
location = location[1];
category = category.split("=");
category = category[1];
 
if(location != ''){

  $("#jobTitle").val(jobTitle);
  $("#category").val(category);
  $("#location").val(location);
  validate();
}

}catch(err) {
console.log(err.message);
}

});//end doc

function loadLocations(){

  $.ajax({
    type: 'POST',
    url: 'getLocations.php',
    async:false,
    success: function (data) {
      var myLocations = $.parseJSON(data);
        $.each(myLocations, function(i,v){
        $('#location').append($('<option>', {
          value: v.id,
          text: v.location
           }));
        });
        $('#location').val(0);
    },
  }); 
}
function loadCategories(){

    $.ajax({
    type: 'POST',
    url: 'getCategories.php',
    async:false,
    success: function (data) {
      var myCategories = $.parseJSON(data);
        $.each(myCategories, function(i,v){
        $('#category').append($('<option>', {
          value: v.id,
          text: v.jobCategory
           }));
        });
        $('#category').val(0);
    },
  }); 

}

function ShowDetails(e){
  var Detaildis = $('#detail-'+e).css('display');
  alert($('#detail-'+e).html());
  if(Detaildis == 'none'){
    $('#detail-'+e).show();
  }else{
    $('#detail-'+e).hide();
  }
}
</script>
<div class="row">
<div class="col-12 center h1">
Search Jobs
</div>
<br>
<hr />
<div class="col-12">
<br>
</div>

<div class="col-4 mycenter1">
<img class="emp_register" src="../img/findjobs.jpg">
</div>
<div class="col-5">
<form name="myform" id="myform" method="post" action="loadJobs.php" onsubmit="return validate();">
<table class="textpadding">
<tr>

<td>Job Title</td>
<td><input type="text" size="20" id="jobTitle" name="jobTitle"></td>
</tr>
<tr>
<td>Specialization</td>
<td><select name="category" id="category">
 
</select></td>
</tr>

<tr>
<td>Location</td>
<td><select name="location" id="location">
 
</select>
</td>
</tr>



<tr>
<td><input type="submit" value="Search"></td>
<td><input type="reset" value="Clear"></td>
</tr>
</table>
</form>
</div>
<br>
<br>
<div class="col-3 mycenter">
Are you an employer? <b><a href="../employer">Visit Employer panel</a></b> to post your job requirments. You can post jobs, edit and delete. 
</div>


</div>

<div class="col-12 mytext">
Search Result
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