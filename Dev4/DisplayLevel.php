<?php
require_once ('ValueGenerator.php');
require_once ('functions.php');
require_once ('SessionFunctions.php');
?>

<link href="path/to/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

<?php

function DisplayLevel(string $level, string $type): void
{

    $letters = ValueGenerator::GenerateQuestionValues($type);
    $lettersInSentence = ArrayToString($letters);

    $levelUrl = $level . '.php';
    ?>

        <h3>Here are the values: <?=$lettersInSentence?></h3>
        <form action="<?=$levelUrl?>" method="post" id="form1">

            <label for="inputAnswer">Please insert you answer in the following format. A1, B1, C1</label><br>
            <input type="text" name="answer" id="inputAnswer" placeholder="Your answer">

            <?php foreach ($letters as $letter) { ?>
                <input type="hidden" name="UnsortedLetters[]" value="<?=$letter?>">
            <?php } ?>

            <br>
            <input type="submit" class="sendButton" id="sendButton" name="send" style="padding: 1%;">
            <button  class="abandon" id="abandon" name="abandon" style="padding: 1%; margin-left: 2%"><a href="..\Dev4\abandon.php">Abandon</a></button>
        </form>
    </div>

<?php } ?>

