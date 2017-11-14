<?php
include_once 'config.php';
public $id, $title, $size, $color, $desc, $rating, $price, $image;
public function display(){
	$qry="select $title,$price,$image from product";
                $res=mysqli_query($link, $qry) or die(mysqli_error($link));
                while ($r=mysqli_fetch_row($res))
                {
                    if(!isset($_REQUEST["p_id"]))
                    {
                        $a=-1;
                    }
                    else
                    {
                        $a=$_REQUEST["bid"];
                    } 
                    if($a!=$r[0])
                    {
                        echo'<tr>';
                        echo'<td>';
                        echo"<img src=$r[3] height=80 width=100>";
                        echo'</td>';
                        echo'<td>';
                        echo"Title: $r[1]<br>";
                        echo"Price: $r[2]<br>";
                        echo"<a href=eval.php?p_id=$r[0]>Details</a>";
                         echo'</td>';
                         echo'</tr>';
                    }
                    else
                    {
                         echo '<tr>';
                         echo '<td>';
                         echo "<img src=$r[3] width=100 height=80 />";
                         echo '</td>';
                         echo '<td>';
                         echo'Title : <input type="text" name="t1" value="'.$r[1].'"/><br>';
                         echo' Price:<input type="text" name="t4" value="'.$r[2].'"/><br>';
                         echo"<input type=submit name=addtocart value=Add to cart />";
                         echo"<input type=submit name=buy value=Buy />";
                         echo'</td>';
                         echo'</tr>';
                         
                    }
                }
                    
                
}
?>