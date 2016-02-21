<?php
namespace Euler;

class LettersCounterTest extends \PHPUnit_Framework_TestCase
{
    public function testCountOnlyTheLettersFilteringOutOtherCharacters()
    {
        $counter = new LettersCounter();
        $this->assertEquals(0, $counter(''));
        $this->assertEquals(1, $counter('a'));
        $this->assertEquals(2, $counter('ab'));
        $this->assertEquals(2, $counter('a-b'));
        $this->assertEquals(2, $counter('a  b'));
        $this->assertEquals(3 + 7 + 3 + 6 + 3, $counter('one hundred and twenty-one'));
    }
}
