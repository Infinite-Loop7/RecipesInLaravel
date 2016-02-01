<?php
      $dbhost = 'localhost:3306';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'cookit';
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
               $myInputs = $_POST['myInputs'];
            }
                        
            $sql = "INSERT INTO recipe ". "(rec_name, rec_instructions) ". " VALUES('$rec_name','$rec_instructions')";
            
            if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }

            $myInputs = $_POST["myInputs"];
			foreach ($myInputs as $eachInput) {
            $ing_id =$eachInput;
            $sql2= "INSERT INTO measurement ". "(rec_id, ing_id) " . "VALUES('$last_id', '$ing_id')";
            mysqli_query($conn,$sql2);
        	}
            mysqli_close($conn);
     ?>