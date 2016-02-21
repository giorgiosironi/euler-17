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
        $this->assertEquals('three', $this->writer->__invoke(3));
        $this->assertEquals('four', $this->writer->__invoke(4));
        $this->assertEquals('five', $this->writer->__invoke(5));
        $this->assertEquals('six', $this->writer->__invoke(6));
        $this->assertEquals('seven', $this->writer->__invoke(7));
        $this->assertEquals('eight', $this->writer->__invoke(8));
        $this->assertEquals('nine', $this->writer->__invoke(9));
    }

    // TODO: introduce data providers
    public function testNumbersHigherThan20AreComposed()
    {
        $this->assertEquals('twenty', $this->writer->__invoke(20));
        $this->assertEquals('twenty-one', $this->writer->__invoke(21));
    }

    public function testNumbersHigherThan100AreComposed()
    {
        $this->assertEquals('one hundred', $this->writer->__invoke(100));
        $this->assertEquals('one hundred and one', $this->writer->__invoke(101));
    }
}
