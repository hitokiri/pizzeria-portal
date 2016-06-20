<?php
class Product {
  // database connection and table name
    private $conn;
    private $table_name = "Productos";
      
    // object properties
    public $id;
    public $nombre;
    public $precio;
    public $codigo_tipo;
    public $descripcion_producto;
    public $ingredientes;
    public $img_producto;
    public $deleted;
    public $lastmodifiqued;
      
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
// create product
    function create(){

            // query to insert record
            $query = "INSERT INTO 
                        " . $this->table_name . "
                    SET 
                        nombre=:nombre, precio=:precio, codigo_tipo=:codigo_tipo, descripcion_producto=:descripcion_producto, ingredientes=:ingredientes,
                        img_producto=:img_producto,deleted=:deleted,lastmodifiqued=:lastmodifiqued";

            // prepare query
            $stmt = $this->conn->prepare($query);

            // bind values
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":codigo_tipo",$this->codigo_tipo);
            $stmt->bindParam(":descripcion_producto",$this->descripcion_producto);
            $stmt->bindParam(":ingredientes", $this->ingredientes);
            $stmt->bindParam(":img_producto", $this->img_producto);
            $stmt->bindParam(":deleted", $this->deleted);
            $stmt->bindParam(":lastmodifiqued", $this->lastmodifiqued);

            // execute query
            if($stmt->execute()){
                return true;
            }else{
                echo "<pre>";
                    print_r($stmt->errorInfo());
                echo "</pre>";

                return false;
            }
    }    
    
// read products
        function readAll(){

            // select all query
            $query = "SELECT 
                        *
                    FROM 
                        " . $this->table_name . "
                    ORDER BY 
                        id DESC";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // execute query
            $stmt->execute();

            return $stmt;
        }

// used when filling up the update product form
        function readOne(){

            // query to read single record
            $query = "SELECT 
                        name, price, description  
                    FROM 
                        " . $this->table_name . "
                    WHERE 
                        id = " . $this->id . " 
                    LIMIT 
                        0,1";

            // prepare query statement
            $stmt = $this->conn->prepare( $query );

            // bind id of product to be updated
            $stmt->bindParam(1, $this->id);

            // execute query
            $stmt->execute();

            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // set values to object properties
            $this->nombre = $row['nombre'];
            $this->precio = $row['precio'];
            $this->codigo_tipo = $row['codigo_tipo'];
            $this->descripcion_producto = $row['descripcion_producto'];
            $this->ingredientes = $row['ingredientes'];
            $this->img_producto = $row['img_producto'];
            $this->deleted = $row['deleted'];
            $this->lastmodififiqued = $row['lastmodifiqued'];
        }
        
// update the product
function update(){
 
    // update query
    $query = "UPDATE 
                " . $this->table_name . "
            SET 
                nombre = :nombre,
                precio = :precio,
                codigo_tipo = :codigo_tipo,
                descripcion_producto = :descripcion_producto,
                 ingredientes = :ingredientes,
                 img_producto = :img_producto,
                 deleted = :deleted,
                 lastmodifiqued = :lastmodifiqued
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // bind new values
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':descripcion_producto', $this->descripcion_producto);
    $stmt->bindParam(':ingredientes', $this->ingredientes);
    $stmt->bindParam(':img_producto', $this->img_producto);
    $stmt->bindParam(':deleted', $this->deleted);
    $stmt->bindParam(':lastmodifiqued', $this->lastmodififiqued);
    $stmt->bindParam(':id', $this->id);
     
    // execute the query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}

// delete the product
function delete(){

    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
     
    // prepare query
    $stmt = $this->conn->prepare($query);
     
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}
}

