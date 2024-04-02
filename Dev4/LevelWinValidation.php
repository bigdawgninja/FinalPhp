<?php

class LevelWinValidation
{
    static function CalculateWin(string $level, array &$machineInput, string $userRawInput) : bool
    {
        $userProcessedInput = self::ProcessUserInput($userRawInput);

        switch ($level){
            case Level::level1:
            case Level::level3:
                return self::CheckAscendingOrder($machineInput, $userProcessedInput);
            case Level::level2:
            case Level::level4:
                return self::CheckDescendingOrder($machineInput, $userProcessedInput);
            case Level::level5:
            case Level::level6:
                return self::CheckSmallestAndBiggest($machineInput, $userProcessedInput);
            default:
                return false;
        }

    }

    private static function CheckAscendingOrder(array &$machineInput, array $userProcessedInput) : bool{
        sort($machineInput);
        return $machineInput === $userProcessedInput;
    }
    private static function CheckDescendingOrder(array &$machineInput, array $userProcessedInput) : bool {
        rsort($machineInput);
        return $machineInput === $userProcessedInput;
    }

    private static function CheckSmallestAndBiggest(array &$machineInput, array $userProcessedInput) : bool {
        sort($machineInput);

        $result = array();
        $result[] = array_values($machineInput)[0];
        $result[] = end($machineInput);

        return $result === $userProcessedInput;
    }

    private static function ProcessUserInput(string $userRawInput): array
    {
        return explode(", ", $userRawInput);
    }
}

class Level {
    public const level1 = 'level1';
    public const level2 = 'level2';
    public const level3 = 'level3';
    public const level4 = 'level4';
    public const level5 = 'level5';
    public const level6 = 'level6';
}