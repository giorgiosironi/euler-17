<?php
namespace Euler;

/**
 * Most tests do not use data providers in order to stop the test method
 * at the first failure, since failures of "units" or "tens" will be correlated
 * with each other and there is no need to report 10 times the same failure.
 */
class EnglishWordsNumberWriterTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->writer = new EnglishWordsNumberWriter();
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

    public function testTheTeenNumbersAreExceptions()
    {
        $this->assertEquals('ten', $this->writer->__invoke(10));
        $this->assertEquals('eleven', $this->writer->__invoke(11));
        $this->assertEquals('twelve', $this->writer->__invoke(12));
        $this->assertEquals('thirteen', $this->writer->__invoke(13));
        $this->assertEquals('fourteen', $this->writer->__invoke(14));
        $this->assertEquals('fifteen', $this->writer->__invoke(15));
        $this->assertEquals('sixteen', $this->writer->__invoke(16));
        $this->assertEquals('seventeen', $this->writer->__invoke(17));
        $this->assertEquals('eighteen', $this->writer->__invoke(18));
        $this->assertEquals('nineteen', $this->writer->__invoke(19));
    }

    public function testNumbersHigherThan20AreComposed()
    {
        $this->assertEquals('twenty', $this->writer->__invoke(20));
        $this->assertEquals('twenty-one', $this->writer->__invoke(21));
        $this->assertEquals('twenty-nine', $this->writer->__invoke(29));
        $this->assertEquals('thirty', $this->writer->__invoke(30));
        $this->assertEquals('fourty', $this->writer->__invoke(40));
        $this->assertEquals('fifty', $this->writer->__invoke(50));
        $this->assertEquals('sixty', $this->writer->__invoke(60));
        $this->assertEquals('seventy', $this->writer->__invoke(70));
        $this->assertEquals('eighty', $this->writer->__invoke(80));
        $this->assertEquals('ninety', $this->writer->__invoke(90));
    }

    public function testNumbersHigherThan100AreComposedOfAtMostThreeSegments()
    {
        $this->assertEquals('one hundred', $this->writer->__invoke(100));
        $this->assertEquals('one hundred and one', $this->writer->__invoke(101));
        $this->assertEquals('one hundred and twenty-one', $this->writer->__invoke(121));
        $this->assertEquals('nine hundred and ninety-nine', $this->writer->__invoke(999));
    }

    /**
     * Only 1000 is supported in this upper range.
     */
    public function testNumbersHigherThen1000AreComposedOfAtMostFourSegments()
    {
        $this->assertEquals('one thousand', $this->writer->__invoke(1000));
    }

    public static function invalidInputs() {
        return [
            [null],
            [0],
            [1001],
        ];
    }

    /**
     * @dataProvider invalidInputs
     * @expectedException InvalidArgumentException
     */
    public function testInvalidInputsAreRejectedWithAnException($input)
    {
        $this->writer->__invoke($input);
    }
}
