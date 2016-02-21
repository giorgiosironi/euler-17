<?php
namespace Euler;

class WordsNumberWriter
{
    private $ciphers = [
        1 => 'one',
        2 => 'two',
    ];

    public function __invoke($number)
    {
        return $this->ciphers[$number];
    }
}
