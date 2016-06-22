var app = angular.module('myApp', []);
app.directive("editarClientes",function(){
   return {
      templateUrl:"http://localhost/pizzeria/formClienteNuevo.html"
   } ;
});
app.controller('clientesCtrl', function($scope, $http) {
    $scope.estado="formulario";
    $scope.limpiarCampos=function(){
    $scope.id="";
    $scope.idCliente="";
    $scope.nombres="";
    $scope.apellidos="";
    $scope.edad="";
    $scope.sexo="";
    $scope.direccion="";
    $scope.dui="";
    $scope.nit="";
    $scope.telefonoCasa="";
    $scope.telefonoMovil="";
    $scope.email="";
    $scope.tipoCliente="";
    $scope.municipio="";
    $scope.departamento="";
    $scope.foto_cliente="";
    $scope.deleted="";
    $scope.lastmodifiqued="";
    $scope.fechaRegistro="";
    }
    //lectura de todos los clientes para listado de mantenimiento
    $scope.guardarClientes=function(){
        var clientes={
            "id":$scope.id,
            "idCliente":$scope.idCliente,
            "nombres":$scope.nombres,
            "apellidos":$scope.apellidos,
            "edad":$scope.edad,
            "sexo":$scope.sexo,
            "direccion":$scope.direccion,
            "dui":$scope.dui,
            "nit":$scope.nit,
            "telefonoCasa":$scope.telefonoCasa,
            "telefonoMovil":$scope.telefonoMovil,
            "email":$scope.email,
            "tipoCliente":$scope.tipoCliente,
            "municipio":$scope.municipio,
            "departamento":$scope.departamento,
            "foto_cliente":$scope.foto_cliente,
            "deleted":$scope.deleted,
            "lastmodifiqued":$scope.lastmodifiqued,
            "fechaRegistro":$scope.fechaRegistro
        }
        $http.post('http://localhost/pizzeria/guardar_cliente.php',JSON.stringify(clientes)
        ).success(function (data, status, headers, config) {
            console.log(data);
            $scope.limpiarCampos();
            location.href="listadoClientes.php";
        }).error(function(data, status, headers, config){
            console.log(data);
        });
    }

    //funcion para lectura de todos los clientes
    $scope.leerTodosClientes=function(){
       $http.get("http://localhost/pizzeria/leerTodosClientes.php")

            .success(function(response){
                $scope.namess = response.record;
                console.log($scope.namess);
            });
    }

    $scope.editarCliente= function (id) {

        var data={
            "id":id,
        }
        $http.post('http://localhost/pizzeria/read_onecliente.php',JSON.stringify(data)
        ).success(function (data, status, headers, config) {
            $scope.id=data.record.id;
            $scope.idCliente=data.record.idCliente;
            $scope.nombres=data.record.nombres;
            $scope.apellidos=data.record.apellidos;
            $scope.edad=data.record.edad;
            $scope.sexo=data.record.sexo;
            $scope.direccion=data.record.direccion;
            $scope.dui=data.record.dui;
            $scope.nit=data.record.nit;
            $scope.telefonoCasa=data.record.telefonoCasa;
            $scope.telefonoMovil=data.record.telefonoMovil;
            $scope.email=data.record.email;
            $scope.tipoCliente=data.record.tipoCliente;
            $scope.municipio=data.record.municipio;
            $scope.departamento=data.record.departamento;
            $scope.foto_cliente=data.record.foto_cliente;
            $scope.deleted=data.record.deleted;
            $scope.lastmodifiqued=data.record.lastmodifiqued;
            $scope.fechaRegistro=data.record.fechaRegistro;
            $scope.estado='formulario';
            console.log(data);
            //$scope.limpiarCampos();
            //location.href="listadoClientes.php";
        }).error(function(data, status, headers, config){
            console.log(data);
        });
    }

 /*   $scope.id = "";
    $scope.name = "";
    $scope.description = "";
    $scope.price = "";
    
$scope.showCreateForm = function(){
    // clear form
    $scope.clearForm();
     
    // change modal title
    $('#modal-product-title').text("Create New Product");
     
    // hide update product button
    $('#btn-update-product').hide();
     
    // show create product button
    $('#btn-create-product').show();
    
    $('#modal-product-form').openModal(); 
     
}
// clear variable / form values
$scope.clearForm = function(){
    $scope.id = "";
    $scope.name = "";
    $scope.description = "";
    $scope.price = "";
}
// create new product 
$scope.createProduct = function(){
         
    // fields in key-value pairs
    $http.post('http://localhost/crud/create_product.php', {
            'name' : $scope.name, 
            'description' : $scope.description, 
            'price' : $scope.price
        }
    ).success(function (data, status, headers, config) {
        console.log(data);
        // tell the user new product was created
        Materialize.toast(data, 4000);
                 
        // close modal
        $('#modal-product-form').closeModal();
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the list
        $scope.getAll();
    });
}

//$scope.showCreateForm=function(){
//    
//   $('#modal-product-form').openModal(); 
//}

// read products
$scope.getAll = function(){
    $http.get("http://localhost/crud/read_products.php")
    
    .success(function(response){
       $scope.namess = response.records;
       console.log(response) 
    });
}

// retrieve record to fill out the form
$scope.readOne = function(id){
     
    // change modal title
    $('#modal-product-title').text("Edit Product");
     
    // show udpate product button$focus = new Opportunities();
    //$focus->retrieve('375d48e3-3400-2c68-d06d-56015a8925a4');
    ////$focus->load_relationship('opportunities');
    //// $focus->opportunities->getBeans() ;
    //$list = array();
    ////foreach ($focus->opportunities->getBeans()as $contact) {
    ////// $list[$contact->id] = $contact;
    ////echo $contact->name;
    ////}
    //
    //
    //echo json_encode(array('oportunidades'=>$Oportunidades));
    $('#btn-update-product').show();
     
    // show create product button
    $('#btn-create-product').hide();
    var data= JSON.stringify({
        'id' : id 
    })
    // post id of product to be edited
    $http.post('http://localhost/crud/read_one.php',data )
    .success(function(data, status, headers, config){
        console.log(data[0]["id"]);
        // put the values in form
        $scope.id = data[0]["id"];
        $scope.name = data[0]["name"];
        $scope.description = data[0]["description"];
        $scope.price = data[0]["price"];
         
        // show modal
        $('#modal-product-form').openModal();
    })
    .error(function(data, status, headers, config){
        Materialize.toast('Unable to retrieve record.', 4000);
    });
}

$scope.updateProduct = function(){
    $http.post('update_product.php', {
        'id' : $scope.id,
        'name' : $scope.name, 
        'description' : $scope.description, 
        'price' : $scope.price
    })
    .success(function (data, status, headers, config){             
        // tell the user product record was updated
        Materialize.toast(data, 4000);
         
        // close modal
        $('#modal-product-form').closeModal();
         
        // clear modal content
        $scope.clearForm();
         
        // refresh the product list
        $scope.getAll();
    });
}

// delete product
$scope.deleteProduct = function(id){
     
    // ask the user if he is sure to delete the record
    if(confirm("Are you sure?")){
        // post the id of product to be deleted
        $http.post('delete_product.php', {
            'id' : id
        }).success(function (data, statu s, headers, config){
             
            // tell the user product was deleted
            Materialize.toast(data, 4000);
             
            // refresh the list
            $scope.getAll();
        });
    }
}
*/

});

app.controller('productosCtrl', function($scope, $http){
    //funcion para limpiar los campos del formulario Productos
    $scope.limpiarCampos=function(){
        $scope.id="";
        $scope.nombre="";
        $scope.precio="";
        $scope.codigo_tipo="";
        $scope.descripcion_producto="";
        $scope.ingredientes="";
        $scope.img_producto="";
        $scope.deleted="";
        $scope.lastmodifiqued="";
    }
    //funcion para guardar los productos
    $scope.guardarProductos=function(){
        var productos={
            "id":$scope.id,
            "nombre":$scope.nombre,
            "precio":$scope.precio,
            "codigo_tipo":$scope.codigo_tipo,
            "descripcion_producto":$scope.descripcion_producto,
            "ingredientes":$scope.ingredientes,
            "img_producto":$scope.img_producto,
            "deleted":$scope.deleted,
            "lastmodifiqued":$scope.lastmodifiqued
        }
        $http.post('http://localhost/pizzeria/guardar_producto.php',JSON.stringify(productos)
        ).success(function (data, status, headers, config) {
            console.log(data);
            $scope.limpiarCampos();
            location.href="listadoProductos.php";
        }).error(function(data, status, headers, config){
            console.log(data);
        });
    }



    //funcion para lectra de productos para listado

    $scope.leerTodosProductos=function(){
        $http.get("http://localhost/pizzeria/leerTodoProductos.php")
            .success(function(response){
                $scope.namess = response.record;
                console.log($scope.namess);
            });
    }

});
// jquery codes will be here


