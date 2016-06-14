<?php
//conectando a la base de datos
//include_once 'config/database-local.php';
include_once 'config/database.php';
$databases = new Database();
$db = $databases;
//instanciendo el objeto Cliente
include_once 'objects/Cliente.php';
$cliente = new Cliente($db);
 //obteniendo datos posteados
$datos = json_decode(file_get_contents("php://input"));

//generar codigo

function create_guid1()
{
    $microTime = microtime();
    list($a_dec, $a_sec) = explode(" ", $microTime);

    $dec_hex = dechex($a_dec* 1000000);
    $sec_hex = dechex($a_sec);

    ensure_length1($dec_hex, 5);
    ensure_length1($sec_hex, 6);

    $guid = "";
    $guid .= $dec_hex;
    $guid .= create_guid_section1(3);
    $guid .= '-';
    $guid .= create_guid_section1(4);
    $guid .= '-';
    $guid .= create_guid_section1(4);
    $guid .= '-';
    $guid .= create_guid_section1(4);
    $guid .= '-';
    $guid .= $sec_hex;
    $guid .= create_guid_section1(6);

    return $guid;

}

function ensure_length1(&$string, $length)
{
    $strlen = strlen($string);
    if($strlen < $length)
    {
        $string = str_pad($string,$length,"0");
    }
    else if($strlen > $length)
    {
        $string = substr($string, 0, $length);
    }
}

function create_guid_section1($characters)
{
    $return = "";
    for($i=0; $i<$characters; $i++)
    {
        $return .= dechex(mt_rand(0,15));
    }
    return $return;
}

$hoy = date('Y-m-d');


//setieando los valores

$cliente->id = $datos->id;
$cliente->idCliente = create_guid1();
$cliente->nombres = $datos->nombres;
$cliente->apellidos = $datos->apellidos;
$cliente->edad = $datos->edad;
$cliente->sexo = $datos->sexo;
$cliente->direccion = $datos->direccion;
$cliente->dui=$datos->dui;
$cliente->nit = $datos->nit;
$cliente->telefonoCasa = $datos->telefonoCasa;
$cliente->telefonoMovil = $datos->telefonoMovil;
$cliente->email = $datos->email;
$cliente->tipoCliente = $datos->tipoCliente;
$cliente->municipio = $datos->municipio;
$cliente->departamento = $datos->departamento;
$cliente->foto_cliente = $datos->foto_cliente;
$cliente->deleted = 0;
$cliente->lastmodifiqued = $hoy;
$cliente->fechaRegistro = $hoy;

//creando el cliente
if($cliente->create()){
    echo "Cliente Guardad";
}
else {
    echo "No se pudo crear cliente";
}
//echo $datos->nombres;