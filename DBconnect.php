<?php

function selectPlayer(){
  $conn = getDBConnection();
  $query = "SELECT ";
}

function selectView($conn, $valueSelected){
  if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
  }
  $sql = "SELECT * FROM history WHERE id = $valueSelected";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Outcome</th><th>Number of Lives Used</th><th>Date and Time</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["fName"] . "</td>";
        echo "<td>" . $row["lName"] . "</td>";
        echo "<td>" . $row["result"] . "</td>";
        echo "<td>" . $row["livesUsed"] . "</td>";
        echo "<td>" . $row["scoreTime"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}
}
function authenticateUser($redirect = true){
  session_start();

    if(!isset($_SESSION['userid']) && $redirect) {
        header("Location: /Dev3/login.php");
        exit();
    }
}




?>