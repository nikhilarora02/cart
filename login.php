<?php
include_once'conn.php';
if(isset($_POST["login"]))
{
    $username=$_POST["uname"];
    $password=$_POST["upass"];
    $qry="call check_login('$username','$password',@ret)";
    $res=  mysqli_query($link, $qry);
    $res1=mysqli_query($link,"select @ret");
    $r=mysqli_fetch_row($res1);
    $d=$r[0];
    if($d==-1)
    {
        $message = "Oops! Wrong username ";
    echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else
        if($d==-2)
        {
            $message = "Oops! Wrong password";
    echo "<script type='text/javascript'>alert('$message');</script>";
        }
 else 
     if($d==1)
     {
         $message = "Congratulation!<br>You have successfully logged in";
    echo "<script type='text/javascript'>alert('$message');</script>";
      header('Location: main.php?u_name=$username');
     }
}
?>
<!DOCTYPE html>
<html >
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <title>Login</title>
    <style>
  * { box-sizing:border-box; }

body {
  font-family: Helvetica;
  background: #eee;
  -webkit-font-smoothing: antialiased;
}

hgroup { 
  text-align:center;
  margin-top: 4em;
}

h1, h3 { font-weight: 300; }

h1 { color: #636363; }

h3 { color: #4a89dc; }

form {
  width: 380px;
  margin: 4em auto;
  padding: 3em 2em 2em 2em;
  background: #fafafa;
  border: 1px solid #ebebeb;
  box-shadow: rgba(0,0,0,0.14902) 0px 1px 1px 0px,rgba(0,0,0,0.09804) 0px 1px 2px 0px;
}

.group { 
  position: relative; 
  margin-bottom: 45px; 
}


input {
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  -webkit-appearance: none;
  display: block;
  background: #fafafa;
  color: #636363;
  width: 100%;
  border: none;
  border-radius: 0;
  border-bottom: 1px solid #757575;
}

input:focus { outline: none; }


/* Label */

label {
  color: #999; 
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 5px;
  top: 10px;
  transition: all 0.2s ease;
}


/* active */

input:focus ~ label, input.used ~ label {
  top: -20px;
  transform: scale(.75); left: -2px;
  /* font-size: 14px; */
  color: #4a89dc;
}


/* Underline */

.bar {
  position: relative;
  display: block;
  width: 100%;
}

.bar:before, .bar:after {
  content: '';
  height: 2px; 
  width: 0;
  bottom: 1px; 
  position: absolute;
  background: #4a89dc; 
  transition: all 0.2s ease;
}

.bar:before { left: 50%; }

.bar:after { right: 50%; }


/* active */

input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }


/* Highlight */

.highlight {
  position: absolute;
  height: 60%; 
  width: 100px; 
  top: 25%; 
  left: 0;
  pointer-events: none;
  opacity: 0.5;
}


/* active */

input:focus ~ .highlight {
  animation: inputHighlighter 0.3s ease;
}


/* Animations */

@keyframes inputHighlighter {
  from { background: #4a89dc; }
  to  { width: 0; background: transparent; }
}


/* Button */

.button {
  position: relative;
  display: inline-block;
  padding: 12px 24px;
  margin: .3em 0 1em 0;
  width: 100%;
  vertical-align: middle;
  color: #fff;
  font-size: 16px;
  line-height: 20px;
  -webkit-font-smoothing: antialiased;
  text-align: center;
  letter-spacing: 1px;
  background: transparent;
  border: 0;
  border-bottom: 2px solid #3160B6;
  cursor: pointer;
  transition: all 0.15s ease;
}
.button:focus { outline: 0; }


/* Button modifiers */

.buttonBlue {
  background: #4a89dc;
  text-shadow: 1px 1px 0 rgba(39, 110, 204, .5);
}

.buttonBlue:hover { background: #357bd8; }


/* Ripples container */

.ripples {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  background: transparent;
}


/* Ripples circle */

.ripplesCircle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  width: 0;
  height: 0;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.25);
}

.ripples.is-active .ripplesCircle {
  animation: ripples .4s ease-in;
}


/* Ripples animation */

@keyframes ripples {
  0% { opacity: 0; }

  25% { opacity: 1; }

  100% {
    width: 200%;
    padding-bottom: 200%;
    opacity: 0;
  }
}
  
      </style>
      <script>
        $(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
  });

});
      </script>

  
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
     <li><a href="signup.php" style="color: black">Sign up</a></li>
     <li><a href="#" style="color: black"><img src="image/cart.png" width="20px" height="16px"> Cart</a></li>
     </ul>
  </nav>
  
  <body>
<hgroup>
  
  <h3>Login to your account</h3>
</hgroup>
<form action="login.php" method="post">
  <div class="group">
    <input type="text" name="uname"><span class="highlight"></span><span class="bar"></span>
    <label>Username</label>
  </div>
  <div class="group">
    <input type="password" name="upass"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <input type="submit" class="button buttonBlue" value="Login" name="login">
  <a href="signup.php">Sign up</a><br>
   <a href="#">Forget Password</a>
</form>


</body>
</html>