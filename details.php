
<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <script>
      $(document).ready(function(){
        $(".sideimg").hover(function(){
          $(this).css({"width":"200","height":"200"});
        },function(){
          $(this).css({"width":"50","height":"50"});
        });
      });
    </script>
	<style>
	input{
		margin-left: 50px;
	}
		#ptable{
			margin-left: 200px;
		}
		#buy{
		     background-color: #f44336;
		     
		     border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 50px;
		}
		#cart{
		     background-color: #f1c40f;
		     
		     border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin-left: 150px;
		}
    #imgs{
      margin-left: 300px;
    }

	
      #top{
        background-color: lightgrey;
      }
      .ptable tr,.ptable td{
    border-bottom: 1px dashed #000000;

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
     <li><a href="#" style="color: black"><img src="image/cart.png" width="20px" height="16px"> Cart</a></li>
     </ul>
  </nav>
  </div>
      <?php
include_once'conn.php';
$id = $_REQUEST["p_id"];
$qry = "Call product_detail($id)";
$res = mysqli_query($GLOBALS['link'],$qry);
while($r = mysqli_fetch_array($res)){
  echo"<div class=container>";
echo"<table>";
   echo"<tr>";
   echo"<td>";

echo"<a href=$r[8] id=one><img class=sideimg src=$r[8] alt=. width=50 height=50/><br>";
echo"<a href=$r[9] id=two><img class=sideimg src=$r[9] alt=. width=50 height=50/><br>";
echo"<a href=$r[10] id=three><img class=sideimg src=$r[10] alt=. width=50 height=50/><br>";
echo"<a href=$r[11] id=four><img class=sideimg src=$r[11] alt=. width=50 height=50/><br>";
   echo"</td>";
  
      echo"<td>";
        echo"<div id=imgs><a href=$r[7] id=dimg ><img src=$r[7] width=200 height=400/></a></div>";
      echo"</td>";
      
   echo"</tr>";
   echo"<tr>";
   echo"<div class=container-fluid>";
      echo"<table class=ptable>";
            echo"<tr>";
                echo"<td>";
                echo"<b>Product Title</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[1]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>";
                echo"<td>";
                echo"<b>Product ID</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[0]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>";    
                echo"<td>";
                echo"<b>Product Size</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[2]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>"; 
                echo"<td>";
                echo"<b>Product Color</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[3]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>"; 
                echo"<td>";
                echo"<b>Product Rating</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[5]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>"; 
                echo"<td>";
                echo"<b>Product Description</b>:";
                echo"</td>";
                echo"<td>";
                echo"$r[4]";
                echo"</td>";
            echo"</tr>";
            echo"<tr>"; 
                echo"<td>";
                echo"<b>Product Price</b>:";
                echo"</td>";
                echo"<td>";
                echo"&#x20B9;$r[6]";
                echo"</td>";
            echo"</tr>";
      echo"</table>";
   echo"</tr>";
echo"</table>";

echo"&nbsp;&nbsp;<b><a href=cart.php?productid=$r[0]&action=Add id=cart>Cart</a></b>&nbsp;";
echo"<input type=submit id=buy value=BUY name=buy>";
echo"</div>";
}
?>
     
      <script>
    $("#cart").on("click",function(){
        $("#dimg").find("img").clone().addClass("zoom").appendTo("body");
        setTimeout(function(){
            $(".zoom").remove();
        },1000);
    });
      
  </script>
</body>
</html>


     