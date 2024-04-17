<?php


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
function userConnected($redirect = true){
  session_start();

    if(!isset($_SESSION['userid']) && $redirect) {
        header("Location: /Dev3/login.php");
        exit();
    }
}

function connectDB() {
  $host = "localhost";
  $username = 'root';
  $password = '';
  $dbname = 'kidsGames';
  
  // Connect to MySQL
  $conn = new mysqli($host, $username, $password);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  $result = $conn->query("SHOW DATABASES LIKE '$dbname'");
  // this if is when we want to create the DB if it is not created by doing a request to msqli to see 
  // if the resuts comes with 1 it will use it
  if ($result->num_rows == 0) {
      $conn->query("CREATE DATABASE $dbname");
      $conn->select_db($dbname);
  } else {
      $conn->select_db($dbname);
  }

  return $conn;
}


function createDB($conn){
  $sql = "CREATE DATABASE IF NOT EXISTS kidsGames;";

  if ($conn->query($sql) === TRUE) {
   // echo "Database created successfully";
  } else {
    echo "Error creating database: " . $conn->error;
  }

}


  function createTable($conn){
    $sqlTablePlayer = "CREATE TABLE IF NOT EXISTS player( 
        fName VARCHAR(50) NOT NULL, 
        lName VARCHAR(50) NOT NULL, 
        userName VARCHAR(20) NOT NULL UNIQUE,
        registrationTime DATETIME NOT NULL,
        id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
        registrationOrder INTEGER AUTO_INCREMENT,
        PRIMARY KEY (registrationOrder))CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    $sqlTableAuth = "CREATE TABLE IF NOT EXISTS authenticator(   
        passCode VARCHAR(255) NOT NULL,
        registrationOrder INTEGER, 
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
    )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    $sqlTableScore = "CREATE TABLE IF NOT EXISTS score( 
        scoreTime DATETIME NOT NULL, 
        result ENUM('win', 'gameover', 'incomplete'),
        livesUsed INTEGER NOT NULL,
        registrationOrder INTEGER, 
        FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
    )CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci";

    if ($conn->multi_query($sqlTablePlayer.';'.$sqlTableAuth.';'.$sqlTableScore) === TRUE) {
        //echo "Tables created successfully";
        while ($conn->more_results()) {
            $conn->next_result();
            if ($result = $conn->store_result()) {
                $result->free();
            }
        }
        createView($conn);
    } else {
        echo "Error creating tables: " . $conn->error;
    }
}

function createView($conn){
  $dropSql = "DROP VIEW IF EXISTS history";
  if($conn->query($dropSql) === TRUE) {
    //echo "Existing history table dropped successfully<br>";
  } else {
    echo "Error dropping existing history table: " . $conn->error . "<br>";
  }

  $sql = "CREATE VIEW history AS
  SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
  FROM player p
  JOIN score s ON p.registrationOrder = s.registrationOrder;";

  if($conn->query($sql) === TRUE) {
   // echo "View created successfully";
  } else {
    echo "Error creating view: " . $conn->error;
  }
}



function selectDataPlayer($conn, $valueSelected){
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "SELECT $valueSelected FROM Player";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - First Name: " . $row["fName"]. " - Last Name: " . $row["lName"]. " - Username: " . $row["userName"]. "<br>";
    }
} else {
    echo "0 results";
}
}


function selectDataAuth($conn,$valueSelected){
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT $valueSelected FROM authenticator";

  $result = $conn->query($sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo "passCode: ". $row["passCode"]."registrationOrder: " .$row["registrationOrder"];
    }
  }else{
    echo "0 results";
  }

}

function selectDataScore($conn, $valueSelected){
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "SELECT $valueSelected FROM score";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    echo "scoreTime: " . $row["scoreTime"]. " result: " . $row["result"]. " livesUsed: " . $row["livesUsed"]. " - registrationOrder: " . $row["registrationOrder"]. "<br>";
}
} else {
echo "0 results";
}

}

$conn = connectDB();



$conn->close();


?>