<?php
include "DataProduct.php";
include "Product.php";
if (isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];
    $product = DataProduct::getProductById($id);
}
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


<form method="post" action="update_product.php" >
    <input type="hidden" name="id" placeholder="input Id" value="<?php echo $product->getId()?>"><br>
    <input type="text" name="name" placeholder="input Name" value="<?php echo $product->getName()?>" ><br>
    <input type="text" name="price" placeholder="input Price" value="<?php echo $product->getPrice()?>" ><br>
    <button name="update">Update</button>

    <?php

    //    $id= $_POST["id"];
    //    $name=$_POST["name"];
    //    $price=$_POST["price"];
    //    $newproduct= new Product($id, $name, $price);
    //    DataProduct::updateProductById($id, $newproduct);



    ?>
</form>
</body>
</html>

