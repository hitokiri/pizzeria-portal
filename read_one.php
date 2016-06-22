<?php 
// include database and object files
include_once 'config/database.php';
include_once 'objects/Cliente.php';
$database = new Database();
$db = $database; 
// instantiate product object
$cliente = new Cliente($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input")); 
 
// set product property values
$cliente->id = $data->id;

// read the details of product to be edited
$cliente->readOne();
 
// create array
$cliente_arr[] = array(
    "id"=>$row[id],
    "idCliente"=>$row[idCliente],
    "nombres"=>$row[nombres],
    "apellidos"=>$row[apellidos],
    "edad"=>$row[edad],
    "sexo"=>$row[sexo],
    "direccion"=>$row[direccion],
    "dui"=>$row[dui],
    "nit"=>$row[nit],
    "telefonoCasa"=>$row[telefonoCasa],
    "telefonoMovil"=>$row[telefonoMovil],
    "email"=>$row[email],
    "tipoCliente"=>$row[tipoCliente],
    "municipio"=>$row[municipio],
    "departamento"=>$row[epartamento],
    "foto_cliente"=>$row[foto_cliente],
    "deleted"=>$row[deleted],
    "lastmodifiqued"=>$row[lastmodifiqued],
    "fechaRegistro"=>$row[fechaRegistro],
);
 
// make it json format
echo json_encode(['record'=>$cliente_arr]);
?>
