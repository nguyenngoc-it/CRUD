<?php
include "DataProduct.php";
include "Product.php";
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
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    img {
        width: 50px;
    }
</style>
<body>

<form method="post">
<table>
    <caption>Danh sach sản phẩm</caption>
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>


    </tr>
    </thead>
    <tbody>


    <?php


    $products= DataProduct::loadData();
    if(count($products)==0){
        echo " khong co san pham nao";
    }
    foreach ($products as $key=>$product) { ?>
        <tr>
            <td><?php echo $product->id?></td>
            <td><?php echo $product->name?></td>
            <td><?php echo $product->price?></td>
            <td><a href="edit_product.php?id=<?php echo $product->id ?>"><button name="edit">Edit</button></a>
                <a href=index.php?&id=<?php echo $product->id ?>"><button name="delete">Delete</button></a></td>
        </tr>
    <?php } ?>

    <?php
    $products= DataProduct::loadData();

    if(isset($_POST['delete'])){
        $id= $_REQUEST['id'];
        array_splice($products, $id,1   );
        DataProduct::saveData($products);
        header('location: index.php');

    }
    ?>





    </tbody>
    <button name="add">Add product</button>
    <?php
    if(isset($_POST['add'])){
        header('location: addproduct.php');
    }
    ?>
</table>
</form>
</body>
</html>
