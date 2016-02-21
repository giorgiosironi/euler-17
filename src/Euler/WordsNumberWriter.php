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

    private $tens = [
        2 => 'twenty',
        9 => 'ninety',
    ];

    public function __invoke($number)
    {
        $result = '';
        if ($number >= 100) {
            $hundreds = $this->mostSignificantDigit($number);
            $number -= 100 * $hundreds;
            $hundredsPart = $this->ciphers[$hundreds] . ' hundred';
            $separator = ' and ';
            $result .= $hundredsPart;
            if ($number > 0) {
                $result .= $separator;
            }
        }

        if ($number >= 20) {
            $tens = $this->mostSignificantDigit($number);
            $tensPart = $this->tens[$tens];
            $number -= $tens * 10;
            $separator = '-';
            $result .= $tensPart;
            if ($number > 0) {
                $result .= $separator;
            }
        }

        if ($number >= 1) {
            $result .= $this->ciphers[$number];
        }
        return $result;
    }

    private function mostSignificantDigit($number)
    {
        return substr((string) $number, 0, 1);
    }
}
