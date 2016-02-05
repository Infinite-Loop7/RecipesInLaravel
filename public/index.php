<!-- app/views/index.php -->

<!doctype html>
<html lang="en">
<head> <meta charset="UTF-8">
  <title>Laravel and Angular Ingredients Service</title>

    <!-- CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css"> <!-- load bootstrap via cdn -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->
    <style>
        body        { padding-top:30px; }
        form        { padding-bottom:20px; }
        .ingredient    { padding-bottom:20px; }
    </style>

    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.8/angular.min.js"></script> <!-- load angular -->

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
        <script src="js/controllers/mainCtrl.js"></script> <!-- load our controller -->
        <script src="js/services/ingredientsService.js"></script> <!-- load our service -->
        <script src="js/app.js"></script> <!-- load our application -->


</head>
<!-- declare our angular app and controller -->
<body class="container" ng-app="ingredientApp" ng-controller="mainController"> <div class="col-md-8 col-md-offset-2">

    <!-- PAGE TITLE =============================================== -->
    <div class="page-header">
        <h2>Laravel and Angular Single Page Application</h2>
        <h4>Ingredients Service</h4>
    </div>

    <!-- NEW INGREDIENT FORM =============================================== -->
    <form ng-submit="submitIngredient()"> <!-- ng-submit will disable the default form action and use our function -->

        <!-- INGREDIENT NAME -->
        <div class="form-group">
            <input type="text" class="form-control input-lg" name="name" ng-model="ingredientData.Name" placeholder="Name">
        </div>

        <!-- INGREDIENT MeasurementType -->
        <div class="form-group">
            <input type="text" class="form-control input-lg" name="measurement" ng-model="ingredientData.text" placeholder="Enter the measurement type">
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
        </div>
    </form>

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- THE INGREDIENTS =============================================== -->
    <!-- hide these ingredients if the loading variable is true -->
    <div class="ingredient" ng-hide="loading" ng-repeat="ingredient in ingredients track by $index">
        <h3>Ingredient #{{ ingredient.id }} <small>by {{ ingredient.Name }}</h3>
        <p>{{ ingredient.MeasurementType }}</p>

        <p><a href="#" ng-click="deleteIngredient(ingredient.id)" class="text-muted">Delete</a></p>
    </div>

</div>
</body>
</html>
