<?php
    require_once("../php/menu.php")
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="index.css">
        <link type="text/css" rel="stylesheet" href="../js/lightslider/css/lightslider.css" />                  
        <script src="../js/lightslider/js/lightslider.js"></script>
        <script src="../js/lightslider/lightslider.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
    
              loadLocations();
              loadCategories();

        $("#search").click(function(){
          let keyword = $("#keyword").val();
          let location = $("#location option:selected").val();
          let category = $("#category option:selected").val();
          window.open("../searchjobs/index.php?keyword="+keyword+"&location="+location+"&category="+category); 
        });
     }); //end doc ready

function loadLocations(){
 $.post("../searchjobs/getLocations.php", function(data) {
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
 $.post("../searchjobs/getCategories.php", function(data) {
  var myCategories = $.parseJSON(data);
  $.each(myCategories, function(i,v){
    $('#category').append($('<option>', {
      value: v.id,
      text: v.jobCategory
  }));
  });
  
 });
}

$(document).ready(function () {
var parsedData;
$.ajax({url:'getJobs.php', type:'POST', async:false, success:function(data){
   try {
            parsedData = JSON.parse(data);
            }
          catch(err) {
            alertify.error(data);
            return false;
          }

      $.each(parsedData, function(i,v){

      var html = '<td>'+v.jobTitle+'</td><td>'+v.jobCategory+'</td> <td>'+v.location+'</td><td>'+v.salary+'</td>';
      $('<tr>'+html+'</tr>').insertAfter($("#jobs").find('tr:last'));
 
    });
}});


});

</script>
    </head>
    <body>

    <div class="col-12 backimage">
    <div class="searchinputs">
    <input type="text" id="keyword" name="keyword" placeholder="Keyword">
      <select name="location" id="location">
 
    </select>
    <select name="category" id="category">
 
    </select>
    <a href="#" class="myButton" id="search">Search</a>
    </div>
    </div>

    <div class="col-12 secondElement">
    <p class="ourHeader">Our major clients linked with us</p><br>
    </div>
    <div class="col-12">
    <p class="ourHeader2">We have helped various companies all over the New Zealand to hire employees.</p>
    </div>
    <div class="col-3">
    <img class="comp" src="../img/xero.svg">
    </div>
     <div class="col-3">
     <img class="comp" src="../img/microsoft.png">
    </div>
     <div class="col-3">
      <img class="comp" src="../img/fletch.jpg">
    </div>
     <div class="col-3">
      <img class="comp" src="../img/radio.gif">
    </div>

    <div class="col-3">
    <img class="comp" src="../img/packnsave.jpg">
    </div>
     <div class="col-3">
     <img class="comp" src="../img/countdown.jpg">
    </div>
     <div class="col-3">
      <img class="comp" src="../img/spark.png">
    </div>
     <div class="col-3 padding-bottom">
      <img class="comp" src="../img/biotech.png">
    </div>


<div class="object one">
<p class="s2">Search jobs in all over the New Zealand</p>
<p class="s3">The crowning fortune of a man is to be born to some pursuit which finds him employment and happiness, whether it be to make baskets, or broadswords, or canals, or statues, or songs<br><br><a href="../searchjobs" class="myButton2">Search jobs</a></p>
</div>

<div class="col-12 secondElement">
<p class="ourHeader">Everyday thousands of new job openings</p>
</div>
<div class="col-12">

<table id="jobs" class="paleBlueRows">
<thead>
<tr>
<th>Job Title</th>
<th>Category</th>
<th>Location</th>
<th>Salary</th>
</tr>
</thead>
<tbody>
<tr>
</tr>
</tbody>
</table>
</div>
<div class="col-12 ourHeader3">
<a href="#" class="myButton">Load more jobs</a>
</div>

<div class="object two">
<p class="ss2">Register your company with us</p>
<p class="ss3">Thousands of companies are currently registered with Jobs made Easy website. All of our employers get benefit for easy matching job seeker profiles with their maximum capabilities. Jobs made easy is a fastest growing job search engine located and owned 100% by New Zealand<br><br><a href="../employer" class="myButton2">Employer Register</a></p>
</div>

<div class="col-12 secondElement">
    <p class="ourHeader">Our job market statics</p><br>
    </div>
    <div class="col-12 padding-bottom">
    <p class="ourHeader2">Jobs Made Easy Web site is the New Zealand's fastest growing online job board</p>
    </div>

<div class="col-3">
<p class="ourHeader">12981</p>
<p class="ourHeader2">Jobs Posted</p>
<img class="comp2" src="../img/jobs.png">
</div>
<div class="col-3">
<p class="ourHeader">1254</p>
<p class="ourHeader2">Employers</p>
<img class="comp2" src="../img/emp.png">
</div>
<div class="col-3">
<p class="ourHeader">9548</p>
<p class="ourHeader2">Job Seekers</p>
<img class="comp2" src="../img/seeker.png">
</div>
<div class="col-3">
<p class="ourHeader">4589</p>
<p class="ourHeader2">Jobs granted</p>
<img class="comp2" src="../img/matched.png">
</div>
<?php
require_once("../php/footer.php")
?>

</body>
</html>