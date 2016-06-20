<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
//conectando la base de datos
//incluyendo la configuracion
include_once  'config/database.php';
$database = new Database();
$db = $database;

//instanciando el objeto producto
include_once 'objects/product.php';
$producto = new Product($db);
//obteniendo  los datos posteados
$datos = json_decode(file_get_contents("php://input"));
//setiando los valores
$hoy = date('Y-m-d');
$producto->id = $datos->id;
$producto->nombre = $datos->nombre;
$producto->precio = $datos->precio;
$producto->codigo_tipo = $datos->codigo_tipo;
$producto->descripcion_producto = $datos->descripcion_producto;
$producto->ingredientes = $datos->ingredientes;
$producto->img_producto = $datos->img_producto;
$producto->deleted = 0;
$producto->lastmodifiqued = $hoy;

echo $producto->create();

