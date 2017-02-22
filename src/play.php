<?php

namespace CountJr\Braingames;

use function CountJr\Braingames\Games\{
    balanceGame,
    calculatorGame
};

const GAMEROUNDS = 3;

function sayHello($gameTask) {
    echo 'Welcome to the Brain Games!', PHP_EOL, $gameTask, PHP_EOL;
    $userName = readline('May I have your name? ');
    echo 'Hello ', $userName, PHP_EOL;
    return $userName;
}

function getAnswer ($checkAnswer, $wrongAnswerText) {
    for(;;) {
        $answer = readline('Your answer: ');
        if($checkAnswer($answer)) {
            return $answer;
        }
        echo $wrongAnswerText, PHP_EOL;
    }
}

function play($game) {
    $gameList = [
        'balance' => function () { return balanceGame();},
        'calculator' => function () { return calculatorGame();},
        'even' => function () { return balanceGame();},
        'gcd' => function () { return balanceGame();},
        'progression' => function () { return balanceGame();}
    ];
    if (!array_key_exists($game, $gameList)) {
        return 'Game isn\'t in list';
    }
    $currentGameFunction = $gameList[$game];
    [$gameTask, $makeQuestion, $checkAnswer, $wrongAnswerText] = $currentGameFunction();

    $userName = sayHello($gameTask);

    for ($i = 0; $i < GAMEROUNDS; $i += 1) {
        [$value, $correctAnswer] = $makeQuestion();
        echo 'Question: ', $value, PHP_EOL;
        $userAnswer = getAnswer($checkAnswer, $wrongAnswerText);
        if ($userAnswer !== $correctAnswer) {
            echo $userAnswer, ' is wrong answer ;(. Correct answer was ', $correctAnswer, PHP_EOL;
            echo 'Let\'s try again ', $userName, '!', PHP_EOL;
            return 0;
        }
        echo 'Correct!', PHP_EOL;
    }
    echo 'Congratulations, ', $userName, '!', PHP_EOL;
    return 0;
}