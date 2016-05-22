<?php

// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
 
// instantiate database and product object
$database = new Database();
$db = $database;
 
// initialize object
$product = new Product($db);
 
// query products
$stmt = $product->readAll();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
     
    $data="";
    $x=1;
     
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
         
        $data .= '{';
            $data .= '"id":"'  . $id . '",';
            $data .= '"nombre":"'   . $nombre . '",';
            $data .= '"precio": "' . $precio . '","';
            $data .= '"codigo_tipo":' . $codigo_tipo . '","';
            $data .= '"descripcion_producto":' . $decripcion_producto . '","';
            $data .= '"ingredientes":' . $ingredientes . '","';
            $data .= '"img_producto":' . $img_producto . '","';
            $data .= '"deleted":' . $deleted . '","';
            $data .= '"lastmodifiqued":' . $lastmodifiqued . '","';
        $data .= '}'; 
         
        $data .= $x<$num ? ',' : ''; 
         
        $x++;
    }
}
 
// json format output
echo '{"records":[' . $data . ']}';

?>