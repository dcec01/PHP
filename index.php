<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>.error{
    color: red;
  }</style>
  </head>
  <h2><p> Form Validation</p></h2>
  <?php
  $fname=$email=$website=$comment=$gender="";
  $fnameEr = $emailEr = $websiteEr=$genderEr="";
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if(empty($_POST['fname'])){
      $fnameEr="Name is required";
    }
    else{
      $fname=test_input($_POST['fname']);
      if(!preg_match("/^[a-zA-Z-' ]*$/",$fname)){
        $fnameEr="Only Alphabet and Withwspaces are Allowed";
      }
    }
    if(empty($_POST['email'])){
      $emailEr="Email is required";
    }
    else{
     $email=test_input($_POST['email']);
     if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $emailEr="Invalid Email Format";
     }
    }
    if(empty($_POST['website'])){
      $websiteEr="Website is required";
    }
    else{
    $website=test_input($_POST['website']);
    if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)){
      $websiteEr="Invalid URL";
    }
    }
    $comment=test_input($_POST['comment']);
    if(empty($_POST['gender'])){
      $genderEr="Gender is required";
    }
    else{
      $gender=test_input($_POST['gender']);
    
    }
    $website=test_input($_POST['website']);
  }  function test_input($data){
    $data=trim($data);
    $data=htmlspecialchars($data);
    $data=stripslashes($data);
    return $data;
  }
  ?>
  <p><span class="error">* Mandatory Field </span></p>

<body>
<form method="POST" action ="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" >
  Name : <input type="text" name="fname">
  <span class="error">* <?php echo $fnameEr ;?></span>
  <br><br>
  Email : <input type="text" name="email">
  <span class="error">* <?php echo $emailEr ;?></span>
  <br><br>
  Website: <input type="text" name="website">
  <span class="error">*<?php echo $websiteEr; ?></span>
  <br><br>
  Comments: <textarea name="comment" rows="5" cols="40"></textarea> 
  <br><br>
  
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male
<input type="radio" name="gender" value="other">Other
<span class="error">* <?php echo $genderEr;  ?></span>
<br><br>
<input type="submit" name="submit" value="Submit">

</form>
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
