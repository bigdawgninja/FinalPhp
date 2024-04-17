<?php
include("..\Dev5\comm_element.html");
require_once '..\DBconnect.php';
$conn = connectDB();
userConnected(false);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="path/to/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Level 1</title>
</head>
<body>
<div>
    <h1>you've won</h1>
    <p> you will be redirected to the main page in 5 second</p>
    <?php
        $current_time = date("Y-m-d H:i:s");
        $nbLives = 5;

        if(isset($_SESSION['userid'])) {
        echo 'Connected user: ' . $_SESSION['userid']."<br/>";
        $useConnected = $_SESSION['userid'];
        $useConnected = $conn->real_escape_string($useConnected);

        $player_id_query = "SELECT id FROM player WHERE userName = '$useConnected'";
        $player_id_result = $conn->query($player_id_query);

        if($player_id_result && $player_id_result->num_rows > 0) {
            $player_id_row = $player_id_result->fetch_assoc();
            $player_id = $player_id_row['id'];

            $insert_score_query = "INSERT INTO score (scoreTime, result, livesUsed, registrationOrder) VALUES ('$current_time', 'win', $nbLives, (SELECT registrationOrder FROM player WHERE userName = '$useConnected'))";
            $conn->query($insert_score_query);
        }
        }
        else {
            echo '<br/>No user connected';
            
        }
    

    header("refresh:5;url=../main.php");
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<br/>
<?php
include("..\Dev5\comm_footer.html");
?>
</body>
</html>