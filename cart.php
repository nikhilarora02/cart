<?php
include_once 'configuration.php';
session_start();
if(isset($_SESSION["cart"]))
    $cart=$_SESSION["cart"];
if(isset($_REQUEST["productid"]))
    $productid=$_REQUEST["productid"];
if(isset($_REQUEST["action"]))
    $action=$_REQUEST["action"];

switch($action)
{
    case 'Add':
    
        if(isset($cart))
        $cart.=','.$productid;
        else
            $cart=$productid;
        break; 
        
        
    case 'Update':
        foreach($_POST as $key=>$value)
    {
         // echo $key.'<br>';
        if(strstr($key,'qty'))
        {
            $productid=str_replace('qty','',$key);
           // echo $productid.'<br>';
            for($i=1;$i<=$value;$i++)
            {
                if(isset($newcart))
                {
                    $newcart.=','.$productid;
                }
                else
                {
                    $newcart=$productid;
                }
            }
        
        }
    }
    if(isset($newcart))
        {   
            $cart=$newcart;
            
        }
        else
        { 
        $cart="";
        }
    
    break;
    
    
    case 'Delete':
    if(isset($_SESSION["cart"]))
    {
        if($_SESSION["cart"]!="")
        {
            $items=explode(',',$_SESSION['cart']);
            foreach($items as $item)
            {
                if($item!=$productid)
                {
                if(isset($newcart))
                {
                $newcart.=','.$item;
                }
                else
                {
                $newcart=$item;
                }
                }
            }
                       
            if(isset($newcart))
            { 
                $cart=$newcart;
                
            }
            else
            { 
                $cart="";    
            }
            }
        }
        
        break;

        

}
$_SESSION['cart']=$cart;
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
       $con=new clscon();
       $con->getdata();
        ?>
    </body>
</html>
