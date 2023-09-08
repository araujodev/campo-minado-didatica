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

echo "✨Bem vindo ao Campo Minado ✨" . PHP_EOL;
echo "Instrucoes: " . PHP_EOL;
echo "1. Escolha uma linha e uma coluna para jogar (linhas e colunas de 1 a 5)." . PHP_EOL;
echo "2. Se voce acertar um campo com uma bomba, voce perde." . PHP_EOL;
echo "3. Se voce acertar um campo sem uma bomba, voce continua jogando." . PHP_EOL;

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