// public/js/services/ingredientsService.js

angular.module('ingredientsService', [])

.factory('Ingredient', function($http) {

    return {
        // get all the ingredients
        get : function() {
            return $http.get('/api/ingredients');
        },

        // save an ingredient
        save : function(ingredientData) {
            return $http({
                method: 'POST',
                url: '/api/ingredients',
                headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                data: $.param(ingredientData)
            });
        },

        // destroy an ingredient
        destroy : function(id) {
            return $http.delete('/api/ingredients/' + id);
        }
    }

});
