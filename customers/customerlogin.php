<?php
$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}



//include_once '../shared/connection.php';

session_start();

$_SESSION['customerlogin']=false;

$email=$_POST['email'];
$password=$_POST['password'];

$sql_result=mysqli_query($conn,"select * from customers where email='$email' and password='$password'");
$total_rows=mysqli_num_rows($sql_result);

if($total_rows==0)
{
    echo "<h3>Invalid Credentials!!</h3>";
    die;
}

$row=mysqli_fetch_assoc($sql_result);
print_r($row);

echo "<br> Login Success!";
$_SESSION['customerlogin']=true;
$_SESSION['name']=$row['name'];
$_SESSION['userid']=$row['userid'];
header('location:view.php');







?>