<?php

function StartGame() : void
{
    session_start();
    $_SESSION['lives'] = 5;
}

function FailGame(): void
{
    session_start();
    $_SESSION['lives'] -= 1;
    LoseGame();
}

function LoseGame(): void
{
    if (session_status() === PHP_SESSION_ACTIVE && $_SESSION['lives'] == 0) {
        ?> <META HTTP-EQUIV="REFRESH" CONTENT="0;URL=LoseGame.php"> <?php
    }
}