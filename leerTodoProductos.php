<?php
//incluyendo la base de datos y el objeto
include_once 'config/database.php';
include_once 'objects/product.php';

//instaciando la base de datos y el producto

$database = new Database();
$db = $database;

//incializando el objeto

$product = new Product($db);

//consultando los productos
$stmt = $product->readAll();
$num = $stmt->rowCount();

//verificando  si hay mas de 0 registos encontrados;


if($num>0){
    $data=[];
    $data2=[];
    $x=1;

    //recibiendo los datos desde la tabla producto
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data = [
            "id"=>$row[id],
            "nombre"=>$row[nombre],
            "precio"=>$row[codigo_tipo],
            "descripcion_producto"=>$row[descripcion_producto],
            "ingredientes"=>$row[ingredientes],
            "img_productos"=>$row[img_producto],
            "deleted"=>$row[deleted],
            "lastmodifiqued"=>$row[lastmodifiqued],
        ];
        $data2[]=$data;
    }

}
echo json_encode(['record'=>$data2]);
?>