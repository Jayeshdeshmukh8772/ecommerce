<?php

session_start();
$name=$_SESSION['name'];
$uid=$_SESSION['userid'];

$id=$_GET['pid'];

$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}

//Blocking the Already AVailable Product for this Client;

$sql_result=mysqli_query($conn,"select * from cart where client_id=$uid and pdt_id=$id");
$total_row=mysqli_num_rows($sql_result);
if($total_row>0)
{
    echo "Product Already Added to Cart";
    die;
}

$cmd="insert into cart(client_id,client_name,pdt_id) values($uid,'$name',$id)";
$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    echo "Added to Cart Successfully";
    header("location:view.php");
}
else
{
    echo "Failed to add cart", mysqli_error($conn);    
}

?>