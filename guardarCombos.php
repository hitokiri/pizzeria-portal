<?php
//conectando a la base de datos
include_once 'config/database.php';
$database = new  Database();
$db = $database;

//intanciando el objeto combo
include_once 'objects/Combos.php';
$combo = new Combos($db);

//obteniendo los datos posteados por el formulario

$dato = json_decode(file_get_contents("php://input"));
//setiando los valores
$hoy = date('Y-m-d');
$combo->id = $dato->id;
$combo->codigoDeProducto = $dato->codigoDeProducto;
$combo->precioCombo = $dato->precioCombo;
$combo->nombreCombo = $dato->nombreCombo;
$combo->vigencia = $dato->vigencia;
$combo->imgCombo = $dato->imgCombo;
$combo->deleted = 0;
$combo->lastmodifiqued = $hoy;

echo $combo->create();
