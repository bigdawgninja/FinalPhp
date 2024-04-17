<?php
include("..\Dev5\comm_element.html");
require_once '..\DBconnect.php';
$conn = connectDB();
userConnected(false);

   echo"You have decided to abandon the game this will be added to your score<br/>";
   echo"Redirecting to start game in : 5 sec";
   $current_time = date("Y-m-d H:i:s");

   if(isset($_SESSION['userid'])) {
    echo 'Connected user: ' . $_SESSION['userid']."<br/>";
    $useConnected = $_SESSION['userid'];
    $useConnected = $conn->real_escape_string($useConnected);

    $player_id_query = "SELECT id FROM player WHERE userName = '$useConnected'";
    $player_id_result = $conn->query($player_id_query);

    if($player_id_result && $player_id_result->num_rows > 0) {
        $player_id_row = $player_id_result->fetch_assoc();
        $player_id = $player_id_row['id'];

        $insert_score_query = "INSERT INTO score (scoreTime, result, livesUsed, registrationOrder) VALUES ('$current_time', 'incomplete', 5, (SELECT registrationOrder FROM player WHERE userName = '$useConnected'))";
        $conn->query($insert_score_query);
    }
}
    else {
        echo '<br/>No user connected';
        
}
    
   header("refresh:5;url=../main.php");

?>

