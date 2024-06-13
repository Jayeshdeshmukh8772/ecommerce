<?php
session_start();
if(!isset($_SESSION['sellerlogin']))
{
    echo "Illegal Attempt Login First";
    die;
}
if($_SESSION['sellerlogin']==false)
{
    echo "Login Failed!";
    die;
}

$name=$_SESSION['name'];
echo "<h1>$name</h1>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        input
        {
            display: block;
            margin:10px;
        }
    </style>
</head>
<body>    

        <div class="d-flex justify-content-center align-item-center vh-100">

        <form action="upload_pdt.php"  method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Name of pdt">
            <input type="text" name="price" placeholder="Price of pdt">
            <textarea name="details" id="" cols="30" rows="10" placeholder="Discription of pdt"></textarea>
            <input type="file" name="pdt_image" accept=".jpg">

            <input type="submit">
        </form>

        </div>

</body>
</html>
</html>