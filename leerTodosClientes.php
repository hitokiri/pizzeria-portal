<?php
//incluyendo la base de datos y el objeto.
include_once 'config/database.php';
include_once 'objects/Cliente.php';

//instanciando la base de datos y el objeto cliente

$database = new Database();
$db = $database;

//inicializando el objeto
$cliente = new Cliente($db);

//consulstando los clientes
$stmt = $cliente->readAll();
$num = $stmt->rowCount();

//verificando si hay mas de 0 registros encontrados

if($num>0){
    $data=[];
    $data2=[];
    $x=1;

    //recibiendo el contenido de nuestra tabla
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
          $data = [
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

        ];
        $data2[]=$data;
    }


}
echo json_encode(['record'=>$data2]);

?>