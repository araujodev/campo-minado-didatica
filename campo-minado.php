<?php

$gameOver = false;
$secret = [];
$game = [
    ['💣', '💣', '💣', '💣', '💣'],
    ['💣', '💣', '💣', '💣', '💣'],
    ['💣', '💣', '💣', '💣', '💣'],
    ['💣', '💣', '💣', '💣', '💣'],
    ['💣', '💣', '💣', '💣', '💣'],
];

function displayGame($game) {
    echo "| -------| Campo Minado |-------- |" . PHP_EOL;
    echo "| ------------------------------- |" . PHP_EOL;
    for($l = 0; $l < 5; $l++) {
        echo "| ";
        for ($c = 0; $c < 5; $c++) {
            echo "  " . $game[$l][$c] . "  ";
        }
        echo " |" . PHP_EOL;
    }
    echo "| ------------------------------- |" . PHP_EOL;
}

for($l = 0; $l < 5; $l++) {
    for ($c = 0; $c < 5; $c++) {
        $secret[$l][$c] = random_int(0, 1) === 1 ? '💥': '😊';
    }
}

while(!$gameOver) {
    displayGame($game);
    $line = readline("Qual LINHA voce deseja jogar? ");
    $column = readline("Qual COLUNA voce deseja jogar? ");

    if($secret[$line-1][$column-1] === '💥') {
        $gameOver = true;
        $game[$line-1][$column-1] = $secret[$line-1][$column-1];
        displayGame($game);
        echo "!!! 💀 GAME OVER  💀 !!!" . PHP_EOL;
        break;
    }

    $game[$line-1][$column-1] = $secret[$line-1][$column-1];
}