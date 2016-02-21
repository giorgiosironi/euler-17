<?php
namespace Euler;

class EnglishWordsSegment
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
