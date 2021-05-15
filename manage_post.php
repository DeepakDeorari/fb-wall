<!DOCTYPE html>
<html>
<head>
<style>
body {
background-color:#f7f7f7;
}

#mypost {
font-size:40px;
background-color:lightgreen;
}

</style>
</head>

<body>
<h1 style="background-color:#3b5998; color:white;"> facebook </h1>
<br>
<p>Go to home page: <a href = "index.php">Home </a> </p>

</body>
</html>

<?php

include 'connect.php';

$x=1;
$a = $_POST["txt"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if ($uploadOk == 0) {
	echo "<script> window.alert('Sorry, your image was not uploaded.Please upload valid image less than 1.5Mb size.');</script>";
	$x=0;
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
  } else {
	  $x=0;
	  echo "<script>window.alert('Sorry, there was an error uploading your image. Please enter a valid image less than 1.5Mb size');</script>";
  }
}
if ($x == 1) {
	$q = "INSERT INTO user_post (post,img) VALUES ('$a', '$target_file')";
}
$r = $conn->query($q);

if($r) {
	echo " <script>
window.alert('Post Created Successfully');
</script>";

} else {
	echo " <script>
window.alert('Unsuccessful to Create Post');
</script>";
}

?>

