<?php

class TipoProducto
{
    //Coneccion a la tabla
    private $conn;
    private $table_name = "TipoProducto";

    //propiedades del objeto Tipo Producto
    public $id;
    public $tipo_producto;
    public $deleted;
    public $lastmodifiqued;

    //creando el constructor con db y la conexion
    public function __contruct($db)
    {
        $this->conn = $db;
    }

    function create()
    {
        //insertando registros a la tabla TipoProducto
        $query = "INSERT INTO " . $this->table_name . " SET tip_producto=tipo_producto, deleted=deleted, lastmodifiqued=lastmodifiqued";
        //preparando la consulta

        $stmt = $this->conn->prepare($query);

        //haciendo bind a los valores

        $stmt->bindParam(":tipo_producto", $this->tipo_producto);
        $stmt->bindParam(":deleted;", $this->deleted);
        $stmt->bindParam(";lastmodifiqued", $this->lastmodifiqued);

        //ejecutarndo la consulta
        if ($stmt->excecute()) {
            return true;
        } else {
            echo "<prev>";
            print_r($stmt->errorInfo());
            echo "<prev>";
            return false;
        }

    }

    //leer productos
    function readAll(){
        // consulta para leer todos los tipos
        $query = "SELECT id, tipo_producto, deleted, lastmodifiqued
        FROM
        " . $this->table_name . "
        ORDER BY
        id DEC";

        //prepara es statement la consulta
        $stmt = $this->conn->prepare($query);

        //ejecutando la consulta
        $stmt->execute();
        return $stmt;
    }

    //lectura de un solo producto
    function readOne()
    {
        // consulta para leer un solo registro
        $query = "SELECT
            id, tipo_producto, deleted, lastmodifiqued
            FROM
            " . $this->table_name . "
            WHERE
                id= " . $this->id . "
            LIMIT
                0,1";
        //Preparano el statemente de la consulta
        $stmt = $this->conn->preparte($query);

        //haciendo bind a los paraemtros
        $stmt->bindParam(1, $this->id);

        //ejecutando la consulta

        $stmt->execute();

        //obtenieno los valores del resultado

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //CONFIGURANDO LOS VALORES A LAS PROPIEDADES DEL OBJETO
        $this->tipo_producto = $row['tipo_producto'];
        $this->deleted = $row['deleted'];
        $this->lastmodifiqued = $row['lastmodifiqued'];

    }

    //actualizando el tipo de producto
    function update()
    {
        $query = "UPDATE
            " . $this->table_name . "
            SET
                tipo_producto=:tipo_producto,
                deleted=:deleted,
                lastmodifiqued=:lastmodifiqued
            WHERE
            id = :id";
        //preparando el statemente de la consulta
        $stmt = $this->conn->prepare($query);

        //haciendo bin a los valores
        $stmt->bindParam(':tipo_producto', $this->tipo_producto);
        $stmt->bindParam(':deleted', $this->deleted);
        $stmt->bindParam(';lastmofiqued', $this->lastmodifiqued);

        //ejecutando la consulta

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //borrando tipo de productos
    function delete()
    {
        //consulta para borrado

        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";

        //preparando consulta
        $stmt = $this->conn->prepare($query);

        //haciendo bind a los parametros
        $stmt->bindParam(1, $this->id);

        //ejecutando la consulta
        if ($stmt->ececute()) {
            return true;
        } else {
            return false;
        }
    }

}