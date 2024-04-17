<?php
require_once 'DBconnect.php';
userConnected(false);
$conn = connectDB();
createDB($conn);
createTable($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Dev5\styles.css"/>
    <title>Kids Game</title>
</head>
<body>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <div class="triangle-down"></div>
    <header>
        <h1>The Game</h1>
        <nav>
        <?php
        if(isset($_SESSION['userid'])) {
            echo 'Connected user: ' . $_SESSION['userid']."<br/>";
            echo '<a href="Dev5\ShowHistory.php">History</a><br/>';
            echo '<a name="logout_btn" href="Dev3\logout.php">Sign Out</a>';
        } else {
            echo '<a href="Dev3\loginPage.php">Sign In</a><br/>';
            
            echo '<a href="Dev3\signupPage.php">Sign Up</a>';
        }
        ?>
        </nav>
    </header>
    <script src="Dev5\script.js"></script>

    <a href="Dev4\level1.php"><button class="startGame">Start The Game!</button></a>
    <footer>
        <p>Developer 1: Ingride Neslie Youadeu Noumbibou</p>
        <p>Developer 2 and Developer 3: Roland Kardouss</p>
        <p>Developer 4: Marilena Soussani</p>
        <p>Developer 5 and Developer 6: Christopher Velasquez-Chavez</p>
    </footer>

</body>
</html>