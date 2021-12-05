<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m731g932", "Hah9aizi", "m731g932");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $query = "SELECT post_id, content, author_id from Posts";
    if($result = $mysqli->query($query)){
            while ($row = $result->fetch_assoc()){
                $delete = $_POST[$row["post_id"]];
            if($delete="on"){
                    $query = "DELETE FROM Posts WHERE post_id='" . $row["post_id"] . "'";
                if($result = $mysqli->query($query))
                {
                        echo "Post " . $row["post_id"] . " has been deleted.<br>";
                        $result->free();
                }
           }
          }
        }
        $mysqli->close();
