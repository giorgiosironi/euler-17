<?php
namespace Euler;

use InvalidArgumentException;

// TODO: interface
class WordsNumberWriter
{
    private $baseCases = [
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
    ];

    private $tens = [
        2 => 'twenty',
        3 => 'thirty',
        4 => 'fourty',
        5 => 'fifty',
        6 => 'sixty',
        7 => 'seventy',
        8 => 'eighty',
        9 => 'ninety',
    ];

    // TODO: out of range numbers
    public function __invoke($number)
    {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException("Input must be numeric, not " . var_export($number, true));
        }
        if ($number < 1 || $number > 1000) {
            throw new InvalidArgumentException("Input must be in the range [1, 1000], but it's " . var_export($number, true));
        }

        $result = '';
        if ($number >= 100) {
            $hundreds = $this->mostSignificantDigit($number);
            $number -= 100 * $hundreds;
            $hundredsPart = $this->baseCases[$hundreds] . ' hundred';
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
            $result .= $this->baseCases[$number];
        }
        return $result;
    }

    private function mostSignificantDigit($number)
    {
        return substr((string) $number, 0, 1);
    }
}
