<!DOCTYPE html>
<html>
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      
    <title>Read Products</title>
     
    <!-- include material design CSS -->
    <link rel="stylesheet" href="libs/css/materialize/css/materialize.min.css" />
     
    <!-- include material design icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
     
</head>
<!-- custom CSS -->
 <body ng-app="myModule">      
        <div ng-controller="ctrlRead">
           
            
            <table class="table table-striped table-condensed table-hover">
                <thead>

                    <tr>
                        <th class="id" custom-sort order="'id'" sort="sort">Id&nbsp;</th>
                        <th class="name" custom-sort order="'name'" sort="sort">Name&nbsp;</th>
                        <th class="description" custom-sort order="'description'" sort="sort">Description&nbsp;</th>
                        <th class="field3" custom-sort order="'field3'" sort="sort">Field 3&nbsp;</th>
                        <th class="field4" custom-sort order="'field4'" sort="sort">Field 4&nbsp;</th>
                        <th class="field5" custom-sort order="'field5'" sort="sort">Field 5&nbsp;</th>
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
<script src="libs/js/angular.min.js"></script>
<script src="libs/js/tabla.js"></script>
<script>
// angular js codes will be here


</script>
 
</body>

<!-- end container -->
</html>
