<?php
namespace Euler;

use InvalidArgumentException;

// TODO: rename to EnglishWordsNumberWriter
class WordsNumberWriter implements NumberWriter
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

    public function __invoke($number)
    {
        if (!is_numeric($number)) {
            throw new InvalidArgumentException("Input must be numeric, not " . var_export($number, true));
        }
        if ($number < 1 || $number > 1000) {
            throw new InvalidArgumentException("Input must be in the range [1, 1000], but it's " . var_export($number, true));
        }

        $result = '';
        if ($number >= 1000) {
            $segment = new Segment(1000, $this->baseCases, ' thousand', ' and ');
            $result .= $segment->buildFromNumber($number);
            $number = $segment->remainingNumber($number);
        }

        if ($number >= 100) {
            $segment = new Segment(100, $this->baseCases, ' hundred', ' and ');
            $result .= $segment->buildFromNumber($number);
            $number = $segment->remainingNumber($number);
        }

        if ($number >= 20) {
            $segment = new Segment(10, $this->tens, '', '-');
            $result .= $segment->buildFromNumber($number);
            $number = $segment->remainingNumber($number);
        }

        if ($number >= 1) {
            $result .= $this->baseCases[$number];
        }
        return $result;
    }
}

// TODO: move out
class Segment
{
    private $powerOfTen;
    private $lookup;
    private $suffix;
    private $separator;
    
    public function __construct($powerOfTen, array $lookup, $suffix = '', $separator = '')
    {
        $this->powerOfTen = $powerOfTen;
        $this->lookup = $lookup;
        $this->suffix = $suffix;
        $this->separator = $separator;
    }

    public function buildFromNumber($number)
    {
        $hundreds = $this->mostSignificantDigit($number);
        $hundredsPart = $this->lookup[$hundreds] . $this->suffix;
        if ($number % $this->powerOfTen > 0) {
            $hundredsPart .= $this->separator;
        }
        return $hundredsPart;
    }

    public function remainingNumber($number)
    {
        return $number % $this->powerOfTen;
    }

    private function mostSignificantDigit($number)
    {
        return substr((string) $number, 0, 1);
    }
}
