<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <p>Hello Php </p>
  <h2><p> Form Validation</p></h2>
</head>
<body>
<form method="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" >
  NAME : <input type="text" name="fname">
  <br><br>
  Email : <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comments: <textarea name="comment" rows="5" cols="40"></textarea> 
  <br><br>
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<input type="submit" name="submit" value="Submit">

</form>
  <?php
  $fname=$email=$website=$comment=$gender="";
  if($_SERVER['REQUEST_METHOD']=="POST"){
    $fname=test_input($_POST['fname']);
    $email=test_input($_POST['email']);
    $comment=test_input($_POST['comment']);
    $website=test_input($_POST['website']);
    $gender=test_input($_POST['gender']);
  }
  function test_input($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;
  }
  ?>
  <?php
 echo" <h3><p> Your filled Data is:- </p><h3>";
  echo $fname;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $comment;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $gender;
  echo "<br>";

  ?>
</body>
</html>
