<?php

$cartid=$_GET['cartid'];
$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}


$sql_status=mysqli_query($conn,"delete from cart where cart_id=$cartid");
if($sql_status)
{
    echo "Cart Item Removed";
    header('location:viewcart.php');
}
else
{
    echo "Failed to Delete Cart Item";
    echo mysqli_error($conn);
}


?>