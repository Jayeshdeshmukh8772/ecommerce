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
                justify-content:space-around;
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
$conn = new mysqli("localhost","root","","ecommerce_project");
if($conn->connect_error){
    echo " connection failed" ;
    die;
}

$cmd="select * from products";
$sql_result=mysqli_query($conn,$cmd);

while($row=mysqli_fetch_assoc($sql_result))
{
    $pid=$row['pid'];
    $name=$row['name'];
    $price=$row['price'];
    $details=$row['details'];   
    $impath=$row['impath'];

    echo "    
    <div class='product'>
            <div class='name'>$name</div>
            <div class='price'>$price</div>
            <img class='image' src='$impath'>
            <div class='details'>$details</div>

            <div class='action'>            
                <button class='action-edit'>Edit</button>
                <a href='delete_product.php?pid=$pid'>
                    <button class='action-delete'>Delete</button>
                </a>
            </div>
    </div>    
    ";

}



?>