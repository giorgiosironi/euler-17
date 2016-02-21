#!/usr/bin/env php
<?php
use Euler\EnglishWordsNumberWriter;
use Euler\LettersCounter;

require __DIR__ . '/../vendor/autoload.php';
if (count($argv) < 2) {
    echo "php " . __FILE__ . " <UPPER_LIMIT>", PHP_EOL;
    exit(-1);
}
$upperLimit = $argv[1];

$writer = new EnglishWordsNumberWriter();
$counter = new LettersCounter();
$total = 0;
for ($i = 1; $i <= $upperLimit; $i++) {
    $total += $counter($writer($i));
}
echo $total, PHP_EOL;

