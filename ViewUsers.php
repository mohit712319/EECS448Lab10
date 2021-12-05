<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "m731g932", "Hah9aizi", "m731g932");
    if ($mysqli->connect_error){
        printf("Connection failed %s\n", $mysqli->connect_error);
        exit();
    }
    $query = 'SELECT user_id FROM Users';
    echo "<table>";
    echo "<tr>";
    echo "<td>"." Users:" ."</td>";
    echo "</tr>";
      if ($result = $mysqli->query($query)){
              while ($row = $result->fetch_assoc()) {
                 echo "<tr>";
                 echo "<td>" . $row["user_id"] . "</td>";
                 echo "</tr>";
              }
              $result->free();

      }
    echo"</table>";

    $mysqli->close();
   ?>
