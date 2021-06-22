<?php
include_once "DataProduct.php";
include_once "Product.php"
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" >
    <input type="text" name="id" placeholder="input Id" ><br>
    <input type="text" name="name" placeholder="input Name" ><br>
    <input type="text" name="price" placeholder="input Price" ><br>
    <button type="submit" name="add">Add</button>

</form>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
$id= $_POST["id"];
$name=$_POST["name"];
$price=$_POST["price"];

$product= new Product($id, $name, $price);
    DataProduct::addProduct($product);
    header('location: index.php');

}
?>

</body>
</html>