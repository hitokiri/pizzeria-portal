<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PIZZA PLANETA</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/personalizado.css">
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />

</head>
<body class="fondoCliente" ng-app="myApp" ng-controller="productosCtrl" ng-init="limpiarCampos()">
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
<div class="container">
    <div class="row">
        <div class="col s12  teal darken-4" ><span class=" white-text text-white tituloFormulario" size="30">REGISTRO DE PRODUCTOS</span></div>

        <div class="col s12 teal white">
            <div class="row">
                <div class="input-field col s6">
                    <input  id="nombre" type="text" class="validate" ng-model="nombre">
                    <label for="nombre">Nombre del Producto</label>
                </div>
                <div class="input-field col s6">
                    <input id="precio" type="text" class="validate" ng-model="precio">
                    <label for="precio">Precio</label>
                </div>

                    <div class="input-field col s12">
                        <textarea id="descripcion_producto"  name="descripcion_producto" cols="30" rows="10" class="materialize-textarea" ng-model="descripcion_producto"></textarea>
                        <label for="descripcion_producto">Descripcion</label>
                    </div>
                <div class="input-field col s12">
                    <textarea id="ingredientes"  name="ingredientes" cols="30" rows="10" class="materialize-textarea" ng-model="ingredientes"></textarea>
                    <label for="ingredientes">Ingredientes</label>
                </div>

                <div class="input-field col s12">
                    <select id="codigo_tipo" ng-model="codigo_tipo">
                        <option value=""> Elija producto</option>
                        <option value="1">Pizza Personal</option>
                        <option value="2">Pizza Gigante</option>
                        <option value="3">Bebida Gaseosa</option>
                    </select>
                    <label>Tipo de Producto</label>
                </div>
                    </div>

            <div class="file-field input-field">
                <div class="btn teal darken-4">
                    <span>File</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate " type="text" ng-model="img_producto">
                </div>
            </div>
            <div class="center-align">

            <button class="btn waves-effect waves-light teal darken-4" type="submit" ng-click="guardarProductos()">
                <i class="material-icons right">Enviar</i>
            </button>
                </div>
        </div>

    </div>
</div>
</form>
</div>
<script src="lib/jquery-1.11.1.min.js"></script>
<script src="libs/js/angular.min.js"></script>
<script src="libs/js/Controller.js"></script>
<script src="libs/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
        $(".button-collapse").sideNav();
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
    });
</script>
</body>
</html>>