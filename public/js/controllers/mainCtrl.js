// public/js/controllers/mainCtrl.js

angular.module('mainCtrl', [])

// inject the Ingredient service into our controller
.controller('mainController', function($scope, $http, Ingredient) {
    // object to hold all the data for the new Ingredient form
    $scope.ingredientData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

    // get all the ingredients first and bind it to the $scope.ingredients object
    // use the function we created in our service
    // GET ALL Ingredients ==============
    Ingredient.get()
        .success(function(data) {
            console.log(JSON.stringify(data));
            $scope.ingredients = data;
            $scope.loading = false;
        });

    // function to handle submitting the form
    // SAVE AN INGREDIENT ================
    $scope.submitIngredient = function() {
        $scope.loading = true;

        // save the ingredient. pass in ingredient data from the form
        // use the function we created in our service
        Ingredient.save($scope.ingredientData)
            .success(function(data) {

                // if successful, we'll need to refresh the ingredient list
                Ingredient.get()
                    .success(function(getData) {
                        $scope.ingredients = getData;
                        $scope.loading = false;
                    });

            })
            .error(function(data) {
                console.log(data);
            });
    };

    // function to handle deleting an ingredient
    // DELETE A Ingredient ====================================================
    $scope.deleteIngredient = function(id) {
        $scope.loading = true;

        // use the function we created in our service
        Ingredient.destroy(id)
            .success(function(data) {

                // if successful, we'll need to refresh the ingredient list
                Ingredient.get()
                    .success(function(getData) {
                        $scope.ingredients = getData;
                        $scope.loading = false;
                    });

            });
    };

});
