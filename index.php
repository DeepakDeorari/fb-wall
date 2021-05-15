
<!DOCTYPE html>
<html>
 <head>
  <title>facebook</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
h2 {
margin-right:40px;
margin-left:30px;
font-size:2vw auto;
font-family: "Lucida Console", "Courier New", monospace;
background-color: #3b5998;
color:white;
}

body {
background-color: #f7f7f7;
}

#load_data {
border:1px solid grey;
margin-top: 40px;
margin-bottom: 80px;
margin-right: 100px;
margin-left: 80px;
background-color:white;
font-size:1vw;
}

#form_data {
margin-top: 40px;
margin-bottom:40px;
margin-right: 800px;
margin-left:80px;
font-size:1.1vw; 
}

* {
box-sizing:border-box;
 }

.left {
padding:20px;
float:left;
width:20%;
}

.right {
padding:20px;
float:right;
width:20%;
}

.main {
background-color:white;
padding:20px;
float:left;
width:60%;
}

@media screen and (max-width:800px) {
.left, .main, .right {
width:100%;
}
}

</style>

 </head>
 <body>

  <div class="container">
   <h2>facebook <a style="font-size:1.1vw; color:white; margin-left:100px;"  href="index.php">Home</a>   <a style="font-size:1.1vw; color:white; margin-left:10px;"  href="index.php">Refresh</a>  <a style="font-size:1.1vw; color:white; margin-left:10px;"  href="messages.php">Messages</a>  <a style="font-size:1.1vw; color:white; margin-left:10px;"  href="notification.php">Notifications</a>  <a style="font-size:1.1vw; color:white; margin-left:10px;"  href="profile.php">Profile</a>   </h2>
<div class="left">

</div>

<div class="main">


<div id="form_data">
 <form method="post" action="manage_post.php" enctype="multipart/form-data">
upload image:<br> <input type="file" name="file" id="file"><br>
<textarea name="txt" placeholder="Whats on your mind?" required></textarea><br>
<input type="submit" id="submit" name="submit" value="post">
</form>
</div>

<hr><hr/>
<p style="font-size:1.1vw; background-color:#f7f7f7;"> Posts:  </p>

<center>
   <div id="load_data"></div>
   <div id="load_data_message"></div>
</center>
   <br />
   <br />
   <br />
   <br />
  </div>
</div>

<div class="right">

</div>

 </body>
</html>
<script>

$(document).ready(function(){
 
 var limit = 2;
 var start = 0;
 var action = 'inactive';
 function load_country_data(limit, start)
 {
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = "inactive";
    }
   }
  });
 }

 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 
});
</script>




