<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Listado de Productos</title>

    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />

    <!-- include material design icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

</head>
<body ng-app="myApp" ng-controller="productosCtrl">
<nav>
    <div class="nav-wrapper red accent-4">
        <a href="inicio.php" class="brand-logo">Inicio</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="listadoProductos.php">Buscar Productos</a></li>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="listadoClientes.php">Buscar Clientes</a></li>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="productos.php">Productos</a></li>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a href="clientes.html">Clientes</a></li>
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="saliendo.php">Salir</a></li>


                        </ul>
    </div>
</nav>
<style>
    .width-30-pct{
        width:30%;
    }

    .text-align-center{
        text-align:center;
    }

    .margin-bottom-1em{
        margin-bottom:1em;
    }
</style>
<div class="container"  ng-controller="productosCtrl"> <!-- controlador -->
    <div class="row">
        <div class="col s12">
            <h4>LISTADO DE PRODUCTOS</h4>
            <!-- used for searching the current list -->
            <input type="text" ng-model="search" class="form-control" placeholder="Buscar Producto...">

            <!-- table that shows product record list -->
            <table class="hoverable bordered" ng-init="leerTodosProductos()">
                <thead>
                <tr>
                    <th class="text-align-center">Id</th>
                    <!-- <th class="text-align-center">IDCliente</th> -->

                    <th>Nombre</th>
                    <th class="text-align-center">Precio</th>
                    <th class="text-align-center">Codigo_tipo</th>

                    <th class="text-align-center">Drescripcion</th>
                    <th class="text-align-center">Ingredientes</th>
                    <th class="text-align-center">Fecha de Borrado</th>
                    <th class="text-align-center">Fecha de Modificacion</th>
                </tr>
                </thead>
                <tbody >
                <tr ng-repeat="d in namess | filter:search"><!--ng-repeat es un foreach-->
                    <td  class="text-align-center">{{ d.id }}</td>
                    <!--<td>{{ d.idCliente }}</td> -->
                    <td>{{ d.nombre }}</td>

                    <td>{{d.precio}}</td>
                    <td>{{d.codigo_tipo}}</td>
                    <td>{{d.descripcion_producto}}</td>
                    <td>{{d.ingredientes}}</td>
                    <td>{{d.img_producto}}</td>
                    <td>{{d.deleted}}</td>
                    <td>{{d.lastmodifiqued}}</td>

                    <td>
                        <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">Editar></i>Editar</a>
                        <a ng-click="deleteProduct(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">Borrar</i>Borrar</a>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- floating button for creating product -->
            <div class="fixed-action-btn" style="bottom:45px; right:24px;">
                <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal1" ng-click="showCreateForm()"><i class="large material-icons">ADD</i></a>
            </div>

        </div> <!-- end col s12 -->
    </div> <!-- end row -->
    <div id="modal-product-form" class="modal">
        <div class="modal-content">
            <h4 id="modal-product-title">Create New Product4</h4>
            <div class="row">
                <div class="input-field col s12">
                    <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
                    <label for="name">Name</label>
                </div>
                <div class="input-field col s12">
                    <textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Type description here..."></textarea>
                    <label for="description">Description</label>
                </div>
                <div class="input-field col s12">
                    <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Type price here..." value=""/>
                    <label for="price">Price</label>
                </div>
                <div class="input-field col s12">
                    <a id="btn-create-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createProduct()"><i class="material-icons left">add</i>Create</a>

                    <a id="btn-update-product" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateProduct()"><i class="material-icons left">edit</i>Save Changes</a>

                    <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- modal for for creating new product -->


<!-- include jquery -->
<script type="text/javascript" src="libs/js/jquery-1.12.1.js"></script>

<!-- material design js -->
<script src="libs/css/materialize/js/materialize.min.js"></script>

<!-- include angular js -->
<script src="lib/jquery-1.11.1.min.js"></script>
<script src="libs/js/angular.min.js"></script>
<script src="libs/js/Controller.js"></script>
<script src="libs/js/materialize.min.js"></script>
<script>
    // angular js codes will be here
    $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal-trigger').leanModal();
    });


</script>

</body>

<!-- end container -->
</html>
</body>
</html>