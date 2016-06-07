<?php
/**
 * Created by PhpStorm.
 * User: usuario
 * Date: 06-04-16
 * Time: 09:17 PM
 */
class Combos{
    private $conn;
    private $table_name="Combos";

    public $id;
    public $codigoDeProducto;
    public $precioCombo;
    public $nombreCombo;
    public $vigencia;
    public $imgCombo;
    public $deleted;
    public $lastmodifiqued;

    //creando el constructor
    public function __construct($db)
    {
        $this->conn=$db;
    }


    //creando metodo para crear combo
    public function  create(){
        //insertando los registro a la tabla
        $query="INSERT INTO" . $this->table_name . "SET id=id, codigoDeProducto=codigoDeProducto, precioCombo=precioCombo,nombreCombo=nombreCombo,vigencia=vigencia,imgCombo=imgCombo,deleted=deleted,lastmodifiqued=lastmodifiqued";

        //preparando la consulta;

        $stmt=$this->conn->prepare($query);

        //haciendo bind a los valores;
        $stmt->bindParam(":id",$this->id);
        $stmt->bindParam(":codigoDeProducto",$this->codigoDeProducto);
        $stmt->bindParam(":precioCombo",$this->precioCombo);
        $stmt->bindParam(":nombreCombo",$this->nombreCombo);
        $stmt->bindParam(":vigencia",$this->vigencia);
        $stmt->bindParam(":imgCombo",$this->imgCombo);
        $stmt->bindParam(":deleted",$this->deleted);
        $stmt->bindParam(":lastmodifiqued",$this->lastmodifiqued);

        //ejecutando consulta

        if($stmt->execute()){
            return true;
        }else{
            echo  "<pre>";
            print_r($stmt->erroInfo());
            echo "</pre>";
            return false;
        }
    }

    //leer productos
    function  readAll(){
        //creando el select de la consulta
        $query = "SELECT
                id, codigoDeProducto,precioCombo,nombreCombo,vigencia,imgCombo,deleted,lastmodifiqued
                FROM
                " . $this->table_name ."
                ORDER BY
                    id DESC";
        //preparando la consulta

        $stmt=$this->conn->prepare($query);

        //ejecutando la consulta

        $stmt->execute();
        return $stmt;
    }

    //leer un solo producto.
    function readOne(){
        $query="SELECT
                id, codigoDeProducto,precioCombo,nombreCombo,vigencia,imgCombo,deleted,lastmodifiqued
                FROM
                ". $this->table_name ."
                WHERE
                id=". $this->id . "
                LIMIT
                0,1";
        //Preparanddo el statement de la query
        $stmt = $this->conn-prepare($query);

        //haciendo bind para los valores
        $stmt->bindParam(1, $this->id);

        //ejecutando la query

        $stmt->execute();

        //reciviendo el registro desde la db pasado como objeto

        $row = $stmt->fech(PDO::FETCH_ASSOC);

        //Setiando los valores del array recibido

        $this->id=$row['id'];
        $this->codigoDeProducto=$row['codigoDeProducto'];
        $this->precioCombo=$row['precioCombo'];
        $this->nombreCombo=$row['nombreCombo'];
        $this->vigencia=$row['vigencia'];
        $this->imgCombo=$row['imgCombo'];
        $this->deleted=$row['deleted'];
        $this->lastmodifiqued=$row['lastmodifiqued'];

    }

    //Proceso de actualización de los clientes

    function update(){
        //creando la consulta de actulizacion
        $query = "UPDATE
                ". $this->table_name ."
                SET
                    id=:id,
                    codigoDeProducto=:codigoDeProducto,
                    precioCombo=:precioCombo,
                    nombreCombo=:nombreCombo,
                    vigencia=:vigencia,
                    imgCombo=:imgCombo,
                    deleted=:delted,
                    lastmodifiqued=:lastmodifiqued
                WHERE
                    id=:id";
        //preparando el statemente de la query
        $stmt= $this->conn->prepare($query);

        //haciendo bind a los campos y valores

        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':codigoDeProducto',$this->codigoDeProducto);
        $stmt->bindParam(':precioCombo',$this->precioCombo);
        $stmt->bindParam(':vigencia',$this->vigencia);
        $stmt->bindParam(":imgCombo",$this->imgCombo);
        $stmt->bindParam(":deleted",$this->deleted);
        $stmt->bindParam(":lastmodifiqued",$this->lastmodifiqued);

        //ejecutamos la query

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    //creando el método de borrado
    function delete(){
        //generando la consulta de borrado
        $query = "DELTE FROM" .$this->table_name . "where id=?";

        //preparando el statemente de la query
        $stmt = $this->conn->prepare($query);

        //haciendo bind para los valores

        $stmt->bindParam(1, $this->id);

        //ejecutando la query

        if($stmt->excecute()){
            return true;
        }else{
            return false;
        }
    }
}