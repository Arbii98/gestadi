<?php
include("Product.php");
$product = new Product();
$products = $product->getstudents();
$productData = array(
	"products" => $products	
);
echo json_encode($productData);
?>