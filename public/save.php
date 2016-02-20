<?php
            $dbhost = 'localhost';
            $dbuser = 'InfiniteLoop7';
            $dbpass = 'bu#;@MVC*^}4';
            $dbname = 'RecipesProject';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_connect_error());
            }
            
             if(! get_magic_quotes_gpc() ) {
               $rec_name = addslashes ($_POST['rec_name']);
               $rec_instructions = addslashes ($_POST['rec_instructions']);
    
            }else {
               $rec_name = $_POST['rec_name'];
               $rec_instructions = $_POST['rec_instructions']; 
            }
                        
            $sql = "INSERT INTO recipe ". "(rec_name, rec_instructions) ". " VALUES('$rec_name','$rec_instructions')";
            
            if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            
            $myInputs = $_POST["check_list"];
            $myInputs2 =$_POST["measure"];
            foreach (array_filter($myInputs2) as $value) {
                $myInputs3[]=$value;
            }
            
            $max= sizeof($myInputs);
        for ($i=0; $i<$max; $i++){
           $ing_id =$myInputs[$i];
           $ing_id2 =$myInputs3[$i];
            $sql2= "INSERT INTO measurement ". "(rec_id, ing_id, ing_measurement) " . "VALUES('$last_id', '$ing_id', '$ing_id2')";
            mysqli_query($conn,$sql2);
   
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
                <div class="navbar-header">
                    <div class="navbar-header"><a class="navbar-brand page-scroll" href="index.html">Bake It Yourself</a>
                </div>
            </div>
        </nav>
        
        <header>
            <div class="header-content">
                <div class="">
                    <h1 class= "text-center">B.I.Y. </h1>
                    <hr>
                    <p class="lead text-center ">Thank you for adding a new recipe!</p>
                    
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