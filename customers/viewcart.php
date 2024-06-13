<html>
    <head>
        <style>
            .product
            {
                width:300px;
                height:300px;
                border:2px solid gray;
                display:inline-block;
                padding:20px;
                margin:10px;
            }
            .image
            {
                width:100%;
                
            }
            .name
            {
                font-family:"verdana";
                font-size:24px;
            }
            .action
            {
                display:flex;
                justify-content:center;
            }
            .action-edit
            {
                background-color:yellow;
                padding:5px 8px;
                border-radius:5px;
                border:none;
                cursor:pointer;
            }
            .action-delete
            {
                background-color:tomato;
                padding:5px 8px;
                border-radius:5px;
                border:none;
                cursor:pointer;
            }
            
        </style>
    </head>
    <body>
        
    </body>
</html>

<?php

include "menu.html";

$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}

session_start();
$userid=$_SESSION['userid'];

$sql_result=mysqli_query($conn,"select * from cart join products on cart.pdt_id=products.pid where client_id=$userid");

while($row=mysqli_fetch_assoc($sql_result))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];   
    $impath=$row['impath'];
    $cartid=$row['cart_id'];

    echo "    
    <div class='product'>
            <div class='name'>$name</div>
            <div class='price'>$price</div>
            <img class='image' src='$impath'>
            <div class='details'>$details</div>

            <div class='action'>                            
                <a href='deletecart.php?cartid=$cartid'>
                    <button class='action-delete'>Remove from Cart</button>
                </a>
            </div>
    </div>    
    ";

}


?>