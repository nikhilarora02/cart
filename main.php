<?php
include_once 'conn.php';
if(isset($_POST["addtocart"]))
{
  header('Location:cart.php?p_id=$r[0]&action=Add');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <style>
   
      #top{
        background-color: lightgrey;
        height: 100px;
      }
      .tab tr,.tab td{
    border-bottom: 1px dashed #000000;
}
#dimg{
  width: 170px;
  height: 300px;
}
#aboutus{
  background-color: lightpink;
  margin-top: 10px;
}
#contact{
  background-color: lightgrey;
  margin-top: 10px;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 100%;
    margin-bottom: 20px;
    background-color: white;
    border-radius: 5px;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
    padding: 2px 16px;

}
#imgs{
  width: 250px;
  height: 350px;
  padding-left: 70px;
  opacity: 1;
  display: block;
  transition: .5s ease;
  backface-visibility: hidden;
}
body{
  background:white;
}
.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%)
}

.container:hover #imgs {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  
  color: blue;
  font-size: 16px;
  padding: 16px 32px;
}
#cart,#buy
{
  border-radius: 5px;
  padding-left: 30px;
  width: 160px;
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
     <li><a href="main.php" style="color: black">Home</a></li>
     <li><a href="#" style="color: black">About Us</a></li>
     <li><a href="#" style="color: black">Contact</a></li>
     <li><a href="home.php" style="color: black">Log out</a></li>
     <li><a href="cart.php" style="color: black"><img src="image/cart.png" width="20px" height="16px"> Cart</a></li>
     </ul>
  </nav>
<div class="container-fluid" style="padding-top: 2px;">
  <form method="post" action="cart.php">
    <?php
    $qry = "select * from product";
  $res = mysqli_query($GLOBALS['link'],$qry);
  $i=0;
  while($r = mysqli_fetch_array($res))
  {
    if($i==0)
    {echo"<div class=row>";}
     if($i<4)
      {
        echo"<div class=col-md-3 id=inner>";
          echo"<div class=card>";
            echo"<div class=container>";
              echo"<img src=$r[7] id=imgs><br>";
                echo"<div class=middle>";
                  echo" <div class=text><b><i><a href=details.php?p_id=$r[0]>Details</a></i></b></div>";
                echo"</div>";
                  echo"<b>$r[1]</b><br>";
                  echo"<b>Price</b>: &#x20B9;$r[6]<br>";
                  echo"<b>Rating</b>: $r[5]<br>";
                  echo"</div>";
                  echo"&nbsp;&nbsp;<b><a href=cart.php?productid=$r[0]&action=Add id=cart>Cart</a></b>&nbsp;";

                echo"<b><input type=submit id=buy value=BUY name=buy></b>";
            echo"</div>";
        echo"</div>";
        $i++;
      }
      if($i>=4)
      {
        echo"</div>";
        $i=0;
      }
      }
    ?>

  </form> 
</div>
</body>
</html>