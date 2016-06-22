<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
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

$stmt = $cliente->readOne();
// create array
//while ($stmt = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $cliente_arr[] = array(

        "id" => $cliente->id ,
        "idCliente" => $cliente->idCliente,
        "nombres" => $cliente->nombres,
        "apellidos" => $cliente->apellidos,
        "edad" => $cliente->edad,
        "sexo" => $cliente->sexo,
        "direccion" => $cliente->direccion,
        "dui" => $cliente->dui,
        "nit" => $cliente->nit,
        "telefonoCasa" => $cliente->telefonoCasa,
        "telefonoMovil" => $cliente->telefonoMovil,
        "email" => $cliente->email,
        "tipoCliente" => $cliente->tipoCliente,
        "municipio" => $cliente->municipio,
        "departamento" => $cliente->departamento,
        "foto_cliente" => $cliente->foto_cliente,
        "deleted" => $cliente->deleted,
        "lastmodifiqued" => $cliente->lastmodifiqued,
        "fechaRegistro" => $cliente->fechaRegistro,
    );
//}
// make it json format
echo json_encode(['record'=>$cliente_arr]);
?>
