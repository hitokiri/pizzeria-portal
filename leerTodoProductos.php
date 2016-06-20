<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//incluyendo la base de datos y el objeto
include_once 'config/database.php';
include_once 'objects/product.php';

//instanciando la base de datos y el objeto producto

$database = new Database();
$db = $database;

//incializando el objeto producto

$Producto = new Product($db);

//consultando los productos

$stmt = $Producto->readAll();
$num = $stmt->rowCount();

//verificando si hay mas de 0 registros encontrados
$data = [];
$data2 = [];
if($num>0){

    $x=1;

    //recibiendo el contenido

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $data=[
            "id"=>$row[id],
            "nombre"=>$row[nombre],
            "precio"=>$row[precio],
            "codigo_tipo"=>$row[codigo_tipo],
            "descripcion_producto"=>$row[descripcion_producto],
            "ingredientes"=>$row[ingredientes],
            "img_producto"=>$row[img_producto],
            "deleted"=>$row[deleted],
            "lastmodifiqued"=>$row[lastmodifiqued],


        ];
        $data2[]=$data;
    }
}
echo json_encode(['record'=>$data2]);
?>