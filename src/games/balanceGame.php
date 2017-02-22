<?php

namespace CountJr\Braingames\Games;

function balanceNumber($number) {
    sort($number);

    if ($number[3] - $number[0] <= 1) {
        return  join('', $number);
    }

    $number[0] += 1;
    $number[3] -= 1;

    return balanceNumber($number);

}

function balanceGame() {

    $makeQuestion = function () {
        $randNum = (string)rand(1000, 9999);
        $balancedNumber = balanceNumber(str_split($randNum));

        return [$randNum, $balancedNumber];
    };

    $checkAnswer = function ($answer) {
        return !preg_match('/^\D/', $answer);
    };

    return [
        'Balance the given number.',
        $makeQuestion,
        $checkAnswer,
        'Please, type a number'
    ];
}