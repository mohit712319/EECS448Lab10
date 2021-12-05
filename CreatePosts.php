<?php
   $mysqli = new mysqli("mysql.eecs.ku.edu", "m731g932", "Hah9aizi", "m731g932");
   if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["username"];
    $post = $_POST["post"];
    if ($post == ""){
        echo "Post not created because the post is  empty.";
        exit();
    }
    $query = "SELECT user_id FROM Users";
          if ($result = $mysqli->query($query)){
                  while ($row = $result->fetch_assoc()) {
                          if($row["user_id"]==$user){
                                  $valid=true;
                           }
                  }
                $result->free();
          }
          if($valid!=true)
          {
                echo"Post was not created because user_id was not found";
                exit();
          }
          $query = "INSERT INTO Posts (content, author_id) VALUES ('" . $post . "', '" . $user .  "')";
                if ($result = $mysqli->query($query)){
                        echo "Post created successfully";
                }
          $mysqli->close();
?>
