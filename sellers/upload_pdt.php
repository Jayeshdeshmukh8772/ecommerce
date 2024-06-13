<?php

$name=$_POST['name'];
$price=$_POST['price'];
$details=$_POST['details'];

$actual_name=$_FILES['pdt_image']['name'];
$file_name="../img/$actual_name";
move_uploaded_file($_FILES['pdt_image']['tmp_name'],$file_name);

//Next Step
$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}
$cmd="insert into products(name,price,details,impath) values('$name',$price,'$details','$file_name')";
$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    echo "Product Uploaded Successfully!!";
}
else{
    echo "Failed to Upload";
}


?>