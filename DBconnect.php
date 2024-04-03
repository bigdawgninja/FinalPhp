<?php
function connectDB() {
  $host = "localhost";
$username = 'root'; 
$password = '';
$dbname = 'kidsGames'; 
  $conn = new mysqli($host, $username, $password);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->select_db($dbname);
echo "Connected successfully";
return $conn;
}

function createDB($conn){
  $sql = "CREATE DATABASE IF NOT EXISTS kidsGames;";

  if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
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

  if($conn ->multi_query($sqlTablePlayer.';'.$sqlTableAuth.';'.$sqlTableScore) == TRUE) {
    echo "Table created";
  }else{
    echo "I can't". $conn->error;
  }
}
function createView($conn){
  $sql = "CREATE VIEW history AS
  SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
  FROM player p, score s
  WHERE p.registrationOrder = s.registrationOrder;";

  if($conn->multi_query($sql) === TRUE) {
    echo "mashala";
  }else{
    echo "not mashala".$conn->error;
  }
}
function insertDataPlayer($conn,$fName,$lname,$username){
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
 $sql = "INSERT INTO player(fName, lName, userName, registrationTime)
 VALUES('$fName', '$lname', '$username', NOW())";


 if($conn->query($sql) === TRUE) {
  echo "Player successfully created";
 }else{
  echo "Player already exist". $conn->error;
 }
}




  function insertDataAuth($conn,$passCode,$registrationOrder) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert statements for authenticator table
    $sql = "INSERT INTO authenticator(passCode, registrationOrder)
            VALUES($passCode, $registrationOrder)";


    // Execute the insert statements
    if ($conn->query($sql) === TRUE ) {
        echo "Data inserted into authenticator table successfully";
    } else {
        echo "Error inserting data into authenticator table: " . $conn->error;
    } 
}

function insertDataScore($conn,$result,$liveUsed,$registrationOrder ){
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $sql = "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
  VALUES(now(), $result, $liveUsed, $registrationOrder);";

if ($conn->query($sql) === TRUE ) {
  echo "Data inserted into authenticator table successfully";
} else {
  echo "Error inserting data into authenticator table: " . $conn->error;
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