<?php
include "DataProduct.php";
include "Product.php";

if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    $id= $_POST["id"];
    $name=$_POST["name"];
    $price=$_POST["price"];
//    echo $id;
    $newproduct= new Product($id, $name, $price);
    DataProduct::updateProductById($id, $newproduct);
    header("Location: index.php");
//    exit();
}
?>