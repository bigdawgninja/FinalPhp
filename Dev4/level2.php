<?php
require_once ('ValueGenerator.php');
require_once('DisplayLevel.php');
require_once('CalculateResult.php');
require_once ('LevelWinValidation.php');
include("..\Dev5\comm_element.html");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Level 2</title>
    <link href="path/to/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
    <h1>Welcome to level 2</h1>
    <h2>In this level you have to invert sort the letters</h2>
<?php if (!isset($_POST['send'])) {

    DisplayLevel(Level::level2, 'Letters');

}
else {

    CalculateResult    (Level::level2, Level::level3);

} ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<br/>
<?php
include("..\Dev5\comm_footer.html");
?>
</body>
</html>