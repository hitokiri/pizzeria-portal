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


}