<?php

$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}

$name=$_POST['name']; 
$surname=$_POST['surname']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$district=$_POST['district']; 
$contact=$_POST['contact'];
$email=$_POST['email']; 
$password=$_POST['password']; 

$sql_result= mysqli_query($conn, "select * from customers where email='$email'");
$total_rows = mysqli_num_rows($sql_result);

if($total_rows > 0)
{
    echo "<h3> Email already exists </h3>";
    die;
}

$cmd="insert into customers(name,surname,address,city,district,contact,email,password) values('$name','$surname','$address','$city','$district','$contact','$email','$password')";

$query_status = mysqli_query($conn,$cmd);
if($query_status){
    echo "registratiom successfull";
    echo "<a href = 'customerlogin.html'> Login here </a>";
}
else{
    echo "connection successfull ";
}
?>