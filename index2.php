<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Read Products</title>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />
     
    <!-- include material design icons
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" /> -->
     
</head>
<!-- custom CSS -->
 <body ng-app="myApp">
        <div ng-controller="ctrlLeerClientes">
           
            
            <table class="table table-striped table-condensed table-hover">
                <thead>

                    <tr>
                        <th class="id" custom-sort order="'id'" sort="sort">Id&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">IdCliente&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Nombres&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Apelidos&nbsp;</th>
                        <th class="name" custom-sort order="'description'" sort="sort">Edad&nbsp;</th>
                        <th class="field3" custom-sort order="'field3'" sort="sort">Sexo&nbsp;</th>
                        <th class="field4" custom-sort order="'field4'" sort="sort">Dirección&nbsp;</th>
                        <th class="field5" custom-sort order="'field5'" sort="sort">Dui&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">NIT&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Teléfono Casa&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Teléfono Móvil&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Email&nbsp;</th>
                    </tr>
                </thead>
                <tfoot>
                    <td colspan="6">
                        <div class="pagination pull-right">
                            <ul>
                                <li ng-class="{disabled: currentPage == 0}">
                                    <a href ng-click="prevPage()">« Prev</a>
                                </li>
                            
                                <li ng-repeat="n in range(pagedItems.length, currentPage, currentPage + gap) "
                                    ng-class="{active: n == currentPage}"
                                ng-click="setPage()">
                                    <a href ng-bind="n + 1">1</a>
                                </li>
                             
                                <li ng-class="{disabled: (currentPage) == pagedItems.length - 1}">
                                    <a href ng-click="nextPage()">Next »</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tfoot>
                <pre>pagedItems.length: {{pagedItems.length|json}}</pre>
                <pre>currentPage: {{currentPage|json}}</pre>
                <pre>currentPage: {{sort|json}}</pre>
                <tbody>
                    <tr ng-repeat="item in pagedItems[currentPage] | orderBy:sort.sortingOrder:sort.reverse">
                        <td>{{item.id}}</td>
                        <td>{{item.name}}</td>
                        <td>{{item.description}}</td>
                        <td>{{item.field3}}</td>
                        <td>{{item.field4}}</td>
                        <td>{{item.field5}}</td>
                    </tr>
                </tbody>
            </table>
        </div>


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


</script>
 
</body>

<!-- end container -->
</html>
