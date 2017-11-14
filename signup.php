<?php
include_once'conn.php';
if(isset($_POST["reg"]))
{
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$gender = $_POST["gender"];
	$dob = $_POST["dob"];
	$add = $_POST["add"];
	$contact = $_POST["contact"];
	$email = $_POST["email"];
	$uname = $_POST["uname"];
	$password = $_POST["password"];
	$cpassword = $_POST["cpassword"];
	if($password!=$cpassword)
	{   $message = "Your password is not matching with the confirm password";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else{
       $qry = "insert register values('$fname','$lname','$add',$dob,'$email',$contact,'$uname','$password','$cpassword','$gender')";
      $res = mysqli_query($link,$qry) or die(mysqli_error($link));
      if(mysqli_affected_rows($link)==1)
      {$message = "Congratulation!<br>You have successfully registered your self";
		echo "<script type='text/javascript'>alert('$message');</script>";
    	header('Location: main.php');}
    	else
    		echo"Query not Save";
    }
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <style>
      #top{
        background-color: lightgrey;
        height: 100px;
      }
      .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 80%;
    margin-bottom: 20px;
    background-color: white;
    border-radius: 5px;
    margin-top: 20px;
    margin-left: 150px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.container {
    padding: 2px 16px;

}
#save{
	background-color: #f1c40f;
	border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
   padding-left: 10px;
   border-radius: 5px;
   width: 280px;
}
input[type="text"],input[type="email"],input[type="password"],input[type="date"]{
	width: 100%;
    padding: 8px 15px;
    margin: 0px 0;
    box-sizing: border-box;
    
    -webkit-transition: 0.5s;
    transition: 0.5s;
    outline: none;
   

}
input[type=text]:focus,input[type="email"]:focus,input[type="password"]:focus,input[type="date"]:focus{
    border: 3px solid #555;
}
label{
	margin-top: 10px;
}
     </style>
  </head>
  <body>
  <div class="container-fluid">
  <div class="row" id="top">
  <div class="col-md-8">
   <img src="image/shop.png" class="img" style="height: 100px">
   </div>
   <div class="col-md-4" style="padding-top: 30px">
   <h3>The <i><b style="color: #3498db">SHOPPING</b></i> of your dreams&nbsp;&nbsp;<img src="image/toplogo.png" class="img" style="height: 40px"></h3>
   </div>
   </div>
   </div>
  <nav class="container-fluid" style="background: #f1c40f">
     <div class="navbar-header">
     <img src="image/store.png" class="img" style="height: 50px">
     </div>
     <ul class="nav navbar-nav navbar-right">
     <li><a href="home.php" style="color: black">Home</a></li>
     <li><a href="#" style="color: black">About Us</a></li>
     <li><a href="#" style="color: black">Contact</a></li>
     <li><a href="#" style="color: black"><img src="image/cart.png" width="20px" height="16px"> Cart</a></li>
     </ul>
  </nav>
<body>
<form method="post" action="signup.php">
<div class="card">
 <center><img src="image/sign.png" class="img" style="height: 50px"></center>
      <div class="container">
      	  <div class="row"><div class="col-md-3"> <label>First Name:</label></div><div class="col-md-9"><input type="text" name="fname" placeholder="Enter your first name"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Last Name:</label></div><div class="col-md-9"><input type="text" name="lname" placeholder="Enter your last name"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Gender:</label></div><div class="col-md-4"><input type="radio" name="gender" value="M">MALE</div><div class="col-md-4"><input type="radio" name="gender" value="F">FEMALE<br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Date of Birth:</label></div><div class="col-md-9"><input type="date" name="dob" placeholder="Enter your date of birth"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Address:</label></div><div class="col-md-9"><input type="text" name="add" placeholder="Enter your address"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Phone NO.:</label></div><div class="col-md-9"><input type="tel" name="contact" placeholder="Enter your phone number"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Email:</label></div><div class="col-md-9"><input type="email" name="email" placeholder="Enter your e-mail address"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Username:</label></div><div class="col-md-9"><input type="text" name="uname" placeholder="Enter a username"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Password:</label></div><div class="col-md-9"><input type="password" name="password" placeholder="Enter a password"><br><br></div></div>
      	  <div class="row"><div class="col-md-3"><label>Confirm Password:</label></div><div class="col-md-9"><input type="password" name="cpassword" placeholder="Enter a confirm password"><br><br></div></div>
      	  <center><input type="submit" value="Register" name="reg" id="save"></center>
      </div> 	
 </div>
</form>
</body>
</html>