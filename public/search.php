<?php
            $dbhost = 'localhost';
            $dbuser = 'InfiniteLoop7';
            $dbpass = 'bu#;@MVC*^}4';
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   $myInputs = $_POST["check_list"]; //inputed list
   mysql_select_db('cookit');
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
  //query returns array of each recipe 
  $sql = 'SELECT recipe.rec_id, GROUP_CONCAT(ingredient.ing_name) as ing_name, GROUP_CONCAT(measurement.ing_id) as ing_ids 
  FROM recipe, ingredient INNER JOIN measurement 
  WHERE recipe.rec_id = measurement.rec_id AND measurement.ing_id=ingredient.ing_id Group BY recipe.rec_id';
    
   $retval = mysql_query( $sql, $conn ); //retrieves recipes
   $size = mysql_num_rows($retval); //size of the recipes
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
    //puts each query in an array
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {   
     $data[] = $row;
     }

$recid; //matched recipe id;
$s=0;
$matched=0;
$same="none";
if(sizeof($myInputs)>0){
for($i=0; $i<$size; $i++){
  $r_id =  mysql_result($retval, $i,0);
  $ret =  mysql_result($retval, $i,1);
   $ret2 = explode( ',', $ret); //puts the ingredients in an array
   $same = array_intersect($ret2 , $myInputs ); //finds how the ones that are matching
   if(sizeof($same)>$s){
    $recid=$r_id;
    $s=sizeof($same);
    $have = array_intersect($ret2 , $myInputs ); //finds how the ones that are matching
    $diff = array_diff($ret2 , $myInputs ); //finds the ones that are different
    $matched =1;
    } 
  }
}
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
            <div class="header-content">
                <div class="">
                    <h1 class= "text-center">B.I.Y. </h1>
                    <hr>
                    <p class="lead text-center ">Thank you for searching for a recipe!</p>
                    <div align="center">
                    <?php

if($matched==1){
$sql2 ="SELECT recipe.rec_name, ingredient.ing_name, measurement.ing_measurement, ingredient.ing_measureType, recipe.rec_instructions 
FROM recipe, ingredient, measurement
WHERE recipe.rec_id = ". $recid ." AND recipe.rec_id=measurement.rec_id AND measurement.ing_id=ingredient.ing_id";
$retval2 = mysql_query( $sql2, $conn );
$rec2 = mysql_query($sql2, $conn);
   $size2 = mysql_num_rows($rec2);
   echo "Here is the closest match. Enjoy!!!\n"; 
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
   echo"-------------------------------------";
   echo "<br>";
  echo "Missing Ingredients:";
  echo "<br>"; 
   echo implode(", ",$diff);
   //print_r ($diff);//shows what is still missing in the recipe
echo "<br>";
   echo"-------------------------------------";
   echo "<br>";
  echo "Matching Ingredients";
  echo "<br>";
   echo implode(", ",$have);
   //print_r ($have);//shows what is common from ingredients have to ingredients in the recipe
 }
 else{
  echo "Sorry, there are no matches. The ingredients you have cannot match a recipe. Please try again.";
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