<?php
    include("comm_element.html");
    require_once '..\DBconnect.php';
    userConnected(false);
    $conn = connectDB();
    if(isset($_POST['mainMenu'])) {
        header("Location: ..\main.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids Game</title>
</head>
<body>
    <table>
    <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Outcome</th>
                <th>Number of Lives Used</th>
                <th>Date and Time</th>
            </tr>
    </thead>
    <tbody>
    <?php
    if(isset($_SESSION['userid'])){
        echo 'Connected user: ' . $_SESSION['userid']."<br/>";
        $useConnected = $_SESSION['userid'];
        $useConnected = $conn->real_escape_string($useConnected);
        $sql = "SELECT * FROM HISTORY AS v JOIN player as p on v.id = p.id where p.userName = '$useConnected' " ;
        $result = $conn->query($sql);
    }
    if ($result->num_rows > 0) {
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
            } else {
                echo "<tr><td colspan='6'>No data available</td></tr>";
            }
        
    ?>
    </tbody>
    </table>

<br/>
<form method="post">
        <button type="submit" name="mainMenu">Game</button>
    </form>

<?php
include("comm_footer.html");
?>
</body>
</html>