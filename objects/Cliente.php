<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 06-04-16
 * Time: 06:18 PM
 */
class Cliente{
    //Conexion a la base de datons
    private $conn;
    private $table_name="Clientes";
    //atibutos de la tabla
    public $id;
    public $idCliente;
    public $nombres;
    public $apellidos;
    public $edad;
    public $sexo;
    public $direccion;
    public $dui;
    public $nit;
    public $telefonoCasa;
    public $telefonoMovil;
    public $email;
    public $tipoCliente;
    public $municipio;
    public $departamento;
    public $foto_cliente;
    public $deleted;
    public $lastmodifiqued;
    public $fechaRegistro;
    //creando el constructor
    public function __construct($db)
    {
        $this->conn=$db;
    }

    //metodo crear cliente
    public function create(){
        //insertando los registros a la tabla
        $nombre = 'hiko';
        $query= "INSERT INTO 
                " . $this->table_name. " SET idCliente=:idCliente, nombres=:nombres, apellidos=:apellidos, edad=:edad, sexo=:sexo, direccion=:direccion, dui=:dui, nit=:nit, telefonoCasa=:telefonoCasa, telefonoMovil=:telefonoMovil, email=:email, tipoCliente=:tipoCliente, municipio=:municipio, departamento=:departamento, foto_cliente=:foto_cliente, deleted=:deleted, lastmodifiqued=:lastmodifiqued,fechaRegistro=:fechaRegistro";
        //preparando las consuslta

        $stmt= $this->conn->prepare($query);

        //haciendo bind a los valores;
        $stmt->bindParam(":idCliente", $this->idCliente);
        $stmt->bindParam(":nombres", $this->nombres);
        $stmt->bindParam(":apellidos", $this->apellidos);
        $stmt->bindParam(":edad", $this->edad);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":direccion", $this->direccion);
        $stmt->bindParam(":dui", $this->dui);
        $stmt->bindParam(":nit", $this->nit);
        $stmt->bindParam(":telefonoCasa", $this->telefonoCasa);
        $stmt->bindParam(":telefonoMovil", $this->telfonoMovil);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":tipoCliente", $this->tipoCliente);
        $stmt->bindParam(":municipio", $this->municipio );
        $stmt->bindParam(":departamento", $this->departamento);
        $stmt->bindParam(":foto_cliente", $this->foto_cliente);
        $stmt->bindParam(":deleted", $this->deleted);
        $stmt->bindParam(":lastmodifiqued", $this->lastmodifiqued);
        $stmt->bindParam(":fechaRegistro", $this->fechaRegistro);

        //ejecutando consulta
        if($stmt->execute()){
            return true;
        }else{
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";
            return false;
        }
    }

    //leer productos
    function  readAll(){
        //creando el select de la consulta
        $query ="SELECT
                id, idCliente, nombres, apellidos,edad,sexo,direccion,dui,nit,telefonoCasa,telefonoMovil,email,tipoCliente,municipio,departamento,foto_cliente,deleted,lastmodifiqued,fechaRegistro

                FROM
                  " . $this->table_name . "
                ORDER BY
                    id DESC";
        //preparando la query

        $stmt= $this->conn->prepare($query);
        //ejecutando la query
        $stmt->execute();
        return $stmt;
    }

    //leer un solo producto para actualizarlo desde el form
    function  readOne(){
        $query = "SELECT
                id, idCliente, nombres,apellidos,edad, sexo direccion, dui, nit, telefonoCasa,telefonoMovil, email, tipoCliente,  municipio, departamento, foto_cliente, deleted,lastmodifiqued,fechaRegistro
                FROM
                ". $this->table_name. "
                WHERE
                id = " . $this->id . "
                LIMIT
                0,1";
        //preparando el statemente query
        $stmt = $this->conn->prepare($query);

        //haciendo bind a los parametros
        $stmt->bindParam(1, $this->id);

        //ejecutando la query

        $stmt->exceute();

        //reciviendo el registro

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //Setiando los valores del objeto recibido

        $this->idCliente=$row['idCliente'];
        $this->nombres=$row['nombres'];
        $this->apellidos=$row['apellidos'];
        $this->edad=$row['edad'];
        $this->sexo=$row['sexo'];
        $this->direccion=$row['direccion'];
        $this->dui=$row['dui'];
        $this->nit=$row['nit'];
        $this->telefonoCasa=$row['telefonoCasa'];
        $this->telefonoMovil=$row['telefonoMovil'];
        $this->email=$row['email'];
        $this->tipoCliente=$row['tipoCliente'];
        $this->municipio=$row['municipio'];
        $this->departamento=$row['departamento'];
        $this->foto_cliente=$row['foto_cliente'];
        $this->deleted=$row['deleted'];
        $this->lastmodifiqued=$row['lastmodifiqued'];
        $this->fechaRegistro=$row['fechaRegistro'];
    }
    //actualizando los clientes
    function  update(){
        //query de actualizacion
        $query = "UPDATE
                ". $this->table_name . "
                SET
                    idCliente = :idCliente,
                    nombres = :nombres,
                    apellidos = :apellidos,
                    edad = :edad,
                    sexo = :sexo,
                    direccion = :direccion,
                    dui = :dui,
                    nit = :nit,
                    telefonoCasa = :telefonfoCasa,
                    telefonoMovil = :telefonoMovil,
                    email = :email,
                    tipoCliente = :tipoCliente,
                    municipio= :municipio,
                    departamento= :departamento,
                    foto_cliente = :foto_cliente,
                    deleted = :deleted,
                    lastmodifiqued= :lastmodifiqued,
                    fechaRegistro= :fechaRegistro
                WHERE
                    id= :id";

        //preparando el statement de la query
        $stmt = $this->conn->prepare($query);

        //haciendo bind a los valores nuevos que se actualizaran
        $stmt->bindParam(':idCliente',$this->idCliente);
        $stmt->bindParam(':nombres',$this->nombres);
        $stmt->bindParam(':apellidos',$this->apellidos);
        $stmt->bindParam(':edad',$this->edad);
        $stmt->bindParam(':sexo',$this->sexo);
        $stmt->bindParam(':direccion',$this->direccion);
        $stmt->bindParam(':dui',$this->dui);
        $stmt->bindParam(':nit',$this->nit);
        $stmt->bindParam(':telefonoCasa',$this->telefonoCasa);
        $stmt->bindParam(':telefonoMovil',$this->telefonoMovil);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':tipoCliente',$this->tipoCliente);
        $stmt->bindParam(':municipio',$this->municipio);
        $stmt->bindParam(':departamento',$this->departamento);
        $stmt->bindParam(':foto_cliente',$this->foto_cliente);
        $stmt->bindParam(':deleted',$this->deleted);
        $stmt->bindParam(':lastmodifiqued',$this->lastmodifiqued);
        $stmt->bindParam(':fechaRegistro', $this->fechaRegistro);
        $stmt->bindParam(':id',$this->id);

        //ejecutando la query
        if($stmt->excecute()){
            return true;
        }else{
            return false;
        }
    }

    function  delete(){
        //consulta para borrar el registro
        $query = "DELETE FROM" . $this->table_name . "where id=?";
        //preparando la query
        $stmt=$this->conn->prepare($query);

        //bind id al registro a borrar
        $stmt->bindParam(1, $this->id);

        //ejecutando la query
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

}