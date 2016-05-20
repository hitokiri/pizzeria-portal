var app = angular.module('myApp', []);

app.controller('productsCtrl', function($scope, $http) {
    $scope.id = "";
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


});

// jquery codes will be here


