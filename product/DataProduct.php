<?php


class DataProduct
{
    public static $path = "product.json";

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);

    }

    public static function loadData()
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convertToProduct($data);

    }

    public static function convertToProduct($data)
    {
        $products = [];
        foreach ($data as $item) {
            $product = new Product($item->id, $item->name, $item->price);
            array_push($products, $product);
        }
        return $products;
    }

    public static function addProduct($product)
    {
        $products = self::loadData();
        array_push($products, $product);
        self::saveData($products);
    }

    public static function getProductById($id)
    {
        $products= self::loadData();
        foreach ($products as $product){
            if($product->getId()==$id){
                return $product;
            }
        }

    }

    public static function updateProductById($id, $newproduct)
    {
        $products= self::loadData();
        foreach ($products as $product  ){
            if($product->getId()==$id){
                $product->setId($newproduct->getId());
                $product->setName($newproduct->getName());
                $product->setPrice($newproduct->getPrice());
            }
        }
        self::saveData($products);
    }

    public static function deleteProduct($id)
    {
        $products= self::loadData();
        foreach ($products as $product){
            if ($product->getId()==$id){
                array_splice($products, $id,1);
                self::saveData($products);


            }
        }
    }
}