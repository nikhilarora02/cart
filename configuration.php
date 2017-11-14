<?php
class clscon
{
    private $link;
    public function db_connect()
    {
     $host="localhost";
     $username="root";
     $pwd="";
     $this->link=  mysqli_connect($host, $username, $pwd,"cart") or die("connection error".mysqli_error($this->link));
     return $this->link;
    }
    public function db_close() 
    {
    mysqli_close($this->link);    
    }
    public function getdata()
    {
    if(isset($_SESSION["cart"]))

    {
        if($_SESSION["cart"]!=" ")
        {
            $items=explode(',',$_SESSION["cart"]);
            foreach($items as $item)
            {
                $contents[$item]=isset($contents[$item])?$contents[$item]+1:1;
            } 
           
            $output[]="<form name=f1 action=cart.php?action=Update method=post>";
            $output[]="<table border=5>";
            $total=0;
            $link=$this->db_connect();
            foreach($contents as $id=>$qty)
            {
                $qry="select * from product where pid=$id";
                $res=mysqli_query($link,$qry);
                if($r=mysqli_fetch_row($res))
                {
                    $output[]='<tr>';
                    $output[]='<td>';
                    $output[]="<a href=cart.php?productid=$r[0]&action=Delete>Delete</a>";
                    $output[]="</td>";
                    $output[]="<td>";
                    $output[]="$r[1] by $r[2]";
                    $output[]="</td>";
                    $output[]="<td>";
                    $output[]="$r[3]";
                    $output[]="</td>";
                    $output[]="<td>";
                    $output[]="$r[4]";
                    $output[]="</td>";
                   $amt=$r[6]*$qty;
                   $total+=$amt;
                   $output[]="<td>";
                  $output[]="<input type=text name=qty$id value=$qty />";
                  $output[]="</td>";
                  $output[]="<td>";
                  $output[]="$amt";
                  $output[]="</td>";
                  $output[]="</tr>";
                  }
            }
                  $output[]="</table>";
                  $this->db_close();
                  $output[]="Total:$total<br>";
                  $_SESSION['totamt']=$total;
                  $output[]="<input type=submit  name=b1 value=Update /><br>";
                  $output[]="<a href=pay.php>Pay Now</a>";
                  $output[]="</form>";
            
            echo join($output);
        }
            
    }
}
    public function save_data()
    {
        if(isset($_SESSION["cart"]))
        {
            if(isset($_SESSION["cart"])!="")
            {
                $items=explode(',',$_SESSION["cart"]);
                foreach($items as $item)
                {
                    $contents[$item]=isset($contents[$item])?$contents[$item]+1:1;
                }   
                 $link=$this->db_connect();
                 $d=date('y/m/d');
                 $qry="insert porder values(null,'$d')";
                
                 $res=  mysqli_query($link, $qry)or die(mysqli_error($link));
                 
                 $ordcod=mysqli_insert_id($link);
                 
                 foreach($contents as $id=>$qty)
                 {
                     $qry1="insert porderdetail values($ordcod,$id,$qty)";
                     $res1=  mysqli_query($link, $qry1) or die(mysqli_error($link));
                 }
                 $this->db_close();
                 session_unset();
                 
                 }
        }
    }
    
    }
?>

