<?php
   $mysqli = new mysqli("mysql.eecs.ku.edu", "m731g932", "Hah9aizi", "m731g932");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];

    if ($user == ""){
        echo "User field is empty please reenter";
        exit();
    }

    $query = "SELECT user_id FROM Users";
    if ($result = $mysqli->query($query)){

         while ($row = $result->fetch_assoc()) {
            if($row["user_id"]==$user)
            {
                $duplicate=true;
                echo "User was not created because" . $user . " is already taken";
            }
         }
         $result->free();
    }

    if($duplicate!=true)
   {
         $query = "INSERT INTO Users  VALUES('" . $user . "');";
        if ($result = $mysqli->query($query)){
                echo "User created successfully";
        }
    }
    $mysqli->close();
?>
