<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m731g932", "Hah9aizi", "m731g932");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }

    $user = $_POST["user_id"];
    echo $user . "'s Posts:<br>";

    $query = "SELECT content from Posts WHERE author_id='$user' ";

    echo "<table>";
     if ($result = $mysqli->query($query)){
        while ($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td> Post:" . $row["content"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table>";


    $mysqli->close();
  ?>
