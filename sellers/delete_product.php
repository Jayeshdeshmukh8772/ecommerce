<?php

$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}
$id=$_GET['pid'];
$cmd="delete from products where pid=$id";
$sql_status=mysqli_query($conn,$cmd);

if($sql_status)
{
    echo "Deleted Successfully!";
    header('location:view.php');
}
else
{
    echo "Failed to Delete";
}


?>