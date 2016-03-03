<?php
$dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   mysql_select_db('cookit');
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   $sql ='SELECT recipe.rec_id FROM recipe';
   $recipe_ids = mysql_query($sql, $conn);
while($row = mysql_fetch_array($recipe_ids, MYSQL_ASSOC)) {
    $data[] = $row;
     }
     $size = mysql_num_rows($recipe_ids);
     var_dump($size);
     for($j=0;$j<$size;$j++){
  $recid=mysql_result($recipe_ids, $j,0);
   $sql2 ="SELECT recipe.rec_name, ingredient.ing_name, measurement.ing_measurement, ingredient.ing_measureType, recipe.rec_instructions 
FROM recipe, ingredient, measurement
WHERE recipe.rec_id = ". $recid ." AND recipe.rec_id=measurement.rec_id AND measurement.ing_id=ingredient.ing_id";
$retval2 = mysql_query( $sql2, $conn );
$rec2 = mysql_query($sql2, $conn);
   $size2 = mysql_num_rows($rec2);
?>


     <html lang="en">
    
    <head>
        
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    
                    <title>Bake It Yourself</title>
                    
                    <!-- Bootstrap -->
                    <link href="css/bootstrap.min.css" rel="stylesheet">
                        <link href-"css/style.css" rel="stylesheet">
                            <link rel="stylesheet" type="text/css" href="css/custom.css">
                                
                                <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                                <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                                <!--[if lt IE 9]>
                                 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                 <![endif]-->
                                
    </head>
    
    <body>
        <nav id="myNavbar" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand page-scroll" href="index.html">Bake It Yourself</a>
                </div>
            </div>
        </nav>
        
        <header>
            <div class="main-content-container">
                <div class="glass"></div>
                <div class="content">
                    <h1 class= "text-center">B.I.Y. </h1>
                    <hr>
                    <p class="lead text-center ">Thank you for searching for a recipe!</p>
                    <div align="center">
                    <?php

   echo "<br>"; 
  echo mysql_result($retval2,0,0);
  echo "<br>";
  for($i=0; $i<$size2;$i++){
    echo mysql_result($retval2, $i,1)." ".mysql_result($retval2, $i,2)." ".mysql_result($retval2, $i,3);
    echo "<br>";
  }
  echo"-------------------------------------";
  echo "<br>";
   
  echo "Instructions:";
     echo "<br>";
   echo mysql_result($retval2,0,4);
   echo "<br>";

}
  mysql_close($conn);

                    ?></div>
                    <div class = "container ">
                        <div class = "row top-buffer" align="center">
                            <div class="col-md-5" >
                                <a href="search-recipe2.html" class="btn btn-primary btn-xl">Search For Recipes</a>
                            </div>
                            <div class= "col-md-6">
                                <a href="add-recipe2.html" class="btn btn-primary btn-xl">Add a new Recipe</a>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </header>
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        
        
    </body>
</html>