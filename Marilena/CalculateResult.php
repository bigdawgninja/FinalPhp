<?php
require_once ('ValueGenerator.php');
require_once('DisplayLevel.php');
require_once('CalculateResult.php');
require_once ('LevelWinValidation.php');
require_once ('SessionFunctions.php');
?>


<link href="path/to/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<?php

function CalculateResult(string $level, string $nextLevel) : void
{
    $levelUrl = $level . '.php';
    $nextLevelUrl = $nextLevel . '.php';
    $letters = $_POST['UnsortedLetters'];
    $userAnswer = $_POST['answer'];

    $gameWon = LevelWinValidation::CalculateWin($level, $letters, $userAnswer);

    $lettersInSentence = ArrayToString($letters);

    if ($level == Level::level6 && $gameWon) {
        ?>
        <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=win.php">
        <?php
    }

    ?>

    <div>
        <h2>The correct answer was <?=$lettersInSentence?></h2>
        <h3>You inserted: <?=$userAnswer?></h3>


        <?php if ($gameWon) { ?>
            <h4>You've won!</h4>
            <a href="<?=$nextLevelUrl?>">Go to the Next level!</a>
            <?php //Here goes the code related to the level progression and the lives used
        } else {
            FailGame();
            ?>
            <h4>You've lost :(</h4>
            <a href="<?=$levelUrl?>">Try again?</a>
        <?php } ?>
    </div>

<?php } ?>
