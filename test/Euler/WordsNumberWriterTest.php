<?php
namespace Euler;

class WordsNumberWriterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->writer = new WordsNumberWriter();
    }
    
    public function testSingleCipherNumbersAreTranslatedWithASingleWord()
    {
        $this->assertEquals('one', $this->writer->__invoke(1));
        $this->assertEquals('two', $this->writer->__invoke(2));
    }
}
