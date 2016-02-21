<?php
namespace Euler;

class WordsNumberWriter
{
    private $ciphers = [
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    ];

    public function __invoke($number)
    {
        return $this->ciphers[$number];
    }
}
