<?php
    include("comm_element.html");
    include("..\DBconnect.php");

    $sql = "SELECT * FROM history"; // Assuming 'history' is your view containing game history data
    $result = $conn->query($sql);
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
<?php
include("comm_footer.html");
?>
</body>
</html>