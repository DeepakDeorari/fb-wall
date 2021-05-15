<?php
if(isset($_POST["limit"], $_POST["start"]))
{
 include 'connect.php';
 $query = "SELECT * FROM user_post ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
 $result = $conn->query($query);
 while($row = mysqli_fetch_array($result))
 {
  echo '
  <h3>'.$row["post"].'<br></h3>
  <img src='.$row["img"].' height="200" width="200">
  <hr /><hr />
  ';
 }
}

?>
