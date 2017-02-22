<?php

namespace CountJr\Braingames\Games;


function calculatorGame() {

    $makeQuestion = function () {
        $randNum = (string)rand(1000, 9999);
        $balancedNumber = balanceNumber(str_split($randNum));

        return [$randNum, $balancedNumber];
    };

    $checkAnswer = function ($answer) {
        return !preg_match('/^\D/', $answer);
    };

    return [
        'What is the result of the expression?',
        $makeQuestion,
        $checkAnswer,
        'Please, type a number'
    ];
}