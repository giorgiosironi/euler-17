<?php
namespace Euler;

class LettersCounter
{
    public function __invoke($phrase)
    {
        $cleanedPhrase = preg_replace('/[^a-z]/', '', $phrase);
        return strlen($cleanedPhrase);
    }
}
