<?php
include_once 'config.php';
function getdetail()
{
    if(isset($_REQUEST["bid"]))
    {
        $con=new clscon();
        $link=$con->db_connect();
        $bid=$_REQUEST["bid"];
        $qry="select * from tbbook where BookID=$bid";
        $res=  mysqli_query($link, $qry);
        $output[]="<table border=5>";
        if($r=mysqli_fetch_array($res))
        {
            $output[]="<tr>";
            $output[]="<td>";
            $output[]="<img src=$r[5] height=100 width=80>";
            $output[]="</td>";
            $output[]="<td>";
            $output[]="Title:$r[1]<br>";
            $output[]="Author:$r[2]<br>";
            $output[]="Publisher:$r[3]<br>";
            $output[]="price:$r[4]<br>";
            $output[]="<a href=cart.php?bid=$r[0]&action=Add>Add to cart</a><br>";
            $output[]="</td>";
			
            $output[]="</tr>";
        }
      $output[]='</table>';
        $con->db_close();
        echo join($output);
    }
    }

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo getdetail();
        ?>
    </body>
</html>
