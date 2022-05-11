<?php
 include "../Controller/EtudiantCore.php";  
$product = new EtudiantCore();
$products = $product->getstudents();
$productData = array(
	"products" => $products	
);
echo json_encode($productData);
?>