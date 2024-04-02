<?php

class ValueGenerator
{
    public static function GenerateQuestionValues(string $type): array
    {
        switch ($type) {
            case ValueType::Letters:
                return self::GenerateLetters();
            case ValueType::Numbers:
                return self::GenerateNumbers();
            default:
                return [];
        }
    }

    private static function GenerateLetters(): array
    {
        $randomLetters = array();
        for ($i = 0; $i < 6; $i++) {
            $randomLetters[] = chr(rand(65, 90));
        }

        return $randomLetters;
    }

    private static function GenerateNumbers() : array
    {
        $randomNumbers = array();

        for ($i = 0; $i < 6; $i++)
            $randomNumbers[] = rand(0,100);

        return $randomNumbers;
    }
}

class ValueType {
    public const Letters = 'Letters';
    public const Numbers = 'Numbers';
}

