<?php
namespace Euler;

class CountLettersScriptTest extends \PHPUnit_Framework_TestCase
{
    public function testTriggeringTheCommandPrintsTheLettersUsedInWritingDownAllTheNumbersUpToTheRequestedOne()
    {
        $this->assertEquals(3, $this->execCommand(1));
        $this->assertEquals(6, $this->execCommand(2));
        $this->assertEquals(36, $this->execCommand(9));
        $this->assertEquals(106, $this->execCommand(19));
        $this->assertEquals(854, $this->execCommand(99));
        $this->assertEquals(21124, $this->execCommand(1000));
    }

    private function execCommand($limit)
    {
        $path = realpath(__DIR__ . '/../../bin/count-letters.php');
        $counter = (int) exec("php $path $limit", $lines, $returnCode);
        $this->assertEquals(0, $returnCode);
        return $counter;
    }
}
