<?php
require_once '..\DBconnect.php';
$conn = connectDB();
userConnected(false);

function StartGame() : void
{
    session_start();
    $nbLives = $_SESSION['lives'] = 5;
    
    $conn = connectDB();

    if (isset($_SESSION['userid'])) {
        $useConnected = $_SESSION['userid'];
        $useConnected = $conn->real_escape_string($useConnected);
        $current_time = date("Y-m-d H:i:s");

        $player_id_query = "SELECT id FROM player WHERE userName = '$useConnected'";
        $player_id_result = $conn->query($player_id_query);

        if ($player_id_result && $player_id_result->num_rows > 0) {
            $player_id_row = $player_id_result->fetch_assoc();
            $player_id = $player_id_row['id'];

            $insert_score_query = "INSERT INTO score (scoreTime, result, livesUsed, registrationOrder) VALUES ('$current_time', 'incomplete', 5, '$player_id')";
            $conn->query($insert_score_query);
        }
    };
}
function FailGame(): void
{
    $nbLive = isset($_SESSION['lives']) ? $_SESSION['lives'] - 1 : 0;
    $conn = connectDB();

    
    if (session_status() === PHP_SESSION_ACTIVE && isset($_SESSION['userid'])) {
        $useConnected = $_SESSION['userid'];
        $useConnected = $conn->real_escape_string($useConnected);

        $player_id_query = "SELECT id FROM player WHERE userName = '$useConnected'";
        $player_id_result = $conn->query($player_id_query);

        if ($player_id_result && $player_id_result->num_rows > 0) {
            $player_id_row = $player_id_result->fetch_assoc();
            $player_id = $player_id_row['id'];

            $update_score_query = "UPDATE score SET livesUsed = $nbLive WHERE registrationOrder = '$player_id'";
            $conn->query($update_score_query);
        }
    }

    LoseGame(); 
}

function LoseGame(): void
{
    if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['lives'] == 0) {
        
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=LoseGame.php"> <?php
    }
}


?>