<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Form Submission</title>
</head>
<body>
  <h1>REGISTRATION FORM</h1>

  <?php
   define("filepath", "data.txt");

  $firstName= $lastName = $gendeR = $birthDay = $relaGion = $emaiL = $userName = $passWord ="";
  $firstNameErr = $lastNameErr = $gendeRErr = $birthDayErr = $relaGionErr = $emaiLErr = $userNameErr = $passWordErr = "";
  $successfulMessage = $errorMessage = "";
  $flag = false;

  if($_SERVER['REQUEST_METHOD'] ==="POST") {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $emaiLErr = $_POST['email'];
    $userName = $_POST['username'];
    $passWord = $_POST['password'];
    

    if(empty($firstName)) {
      $firstNameErr = "Empty!";
    
    $flag = true;

  }
   if(empty($lastName)) {
    $lastNameErr = "Empty!";
    $flag = true;
  }

 

  if(empty($userName)) {
    $userNameErr = "Empty!";
    $flag = true;
  }

if(empty($passWord)) {
    $passWordErr = "Empty!";
    $flag = true;
  }


  if(!$flag){
    $firstName = test_input($firstName);
    $lastName = test_input($lastName);
    $gendeR = test_input($gendeR);
    $birthDay = test_input($birthDay);
    $relaGion = test_input($relaGion);
    $emaiL = test_input($emaiL);
    $userName = test_input($userName);
    $passWord = test_input($passWord);

    $data = array("$firstName" => $firstName, "lastName" => $lastName,"gendeR" => $gendeR, "birthDay" => $birthDay, "relaGion" => $relaGion, "emaiL" => $emaiL, "userName" => $userName, "passWord" => $passWord);
    $data_encode = json_encode($data);
    $result1 = write($data_encode);
if($result1){
   $successfulMessage = "Successfully saved!";
 }
 else{
  $errorMessage = "Error while saving!";
     }
   }
 }
  function write($content){
    $resource = fopen(filepath, "a");
      $fw = fwrite($resource, $content . "\n");
      fclose($resource);
      return $fw;
  }


  function test_input($data) {
         $data =trim($data);
         $data =stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
       } 

?>


<fieldset>
   <legend>Basic Information:</legend>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">

 
   <br> <label for="firstname">FIRST NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="firstname" name="firstname"> <span style="color: red;"><?php echo $firstNameErr; ?></span>
        <br><br>


        <label for="lastname">LAST NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="lastname" name="lastname"> <span style="color: red;"><?php echo $lastNameErr; ?></span>
        <br><br>


<label for="gender"> GENDER <span style="color: red;">*</span>:</label><input type="radio" name="gender" value="gender"><span style="color: red;"><?php echo $gendeRErr; ?></span> Male
<input type="radio" name="gender" value="gender"> <span style="color: red;"><?php echo $gendeRErr; ?></span>Female  <br><br>



<label for="birthday">BIRTHDAY<span style="color: red;">*</span>:</label>
    <input type="date" id="birthday" name="birthday"><br><br>


    <label for="relagion">RELAGION<span style="color: red;">*</span>:</label>
  <select class="form-control dropdown" id="religion" name="religion">
    <option value="" selected="selected" disabled="disabled">-- select one --</option>
    <option value="Islam">Islam</option>
    <option value="Hindu">Hindu</option>
    <option value="Christan">Christan</option> 
          <input CHOOSE><br><br>


</fieldset>



<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
  <fieldset>
    <legend>Contact Information:</legend>

  <br><label for="paddress">PRESENT ADDRESS:</label>
        <input type="textarea" id="paddress" name="paddress"><br><br>

   <label for="address">PERMANENT ADDRESS:</label>
        <input type="textarea" id="address" name="address"><br><br>


    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone"><br><br>

     <label for="email">Email<span style="color: red;">*</span>:</label>
    <input type="email" id="email" name="email"><br><br>

     <label for="website">PERSONAL WEBSITE LINK:</label>
    <input type="url" id="website" name="website"><br><br>

  </fieldset>

<form action="/action_page.php">
  <fieldset>
    <legend>Account Information:</legend>

    <br><label for="username">USER NAME <span style="color: red;">*</span>:</label>
        <input type="text" id="username" name="username"><span style="color: red;"><?php echo $userNameErr; ?></span><br><br>

   <label for="password">PASSWORD <span style="color: red;">*</span>:</label>
        <input type="password" id="password" name="password"><span style="color: red;"><?php echo $passWordErr; ?></span><br><br>


 </fieldset>

 <br><br>
 <input type="submit" name="submit" value="REGISTER">
</form>

<br>
<br>


<span style ="color:green;"><?php echo $successfulMessage; ?></span>
<span style ="color:red;"><?php echo $errorMessage; ?></span>

  
<p>Back to<a href="login-form.php">LOGIN</a></p>
</body>
</html>
