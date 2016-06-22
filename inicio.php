<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PIZZA PLANETA</title>
    <link rel="stylesheet" href="../pizzeria/css/normalize.css.css">
    <link rel="stylesheet" href="../pizzeria/css/personalizado.css">
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />

</head>
<body class="fondoCliente" ng-app="myApp" ng-controller="clientesCtrl" ng-init="limpiarCampos()">
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
</html>
