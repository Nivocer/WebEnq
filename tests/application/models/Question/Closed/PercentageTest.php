<?php

class Webenq_Test_Model_Question_Closed_PercentageTest extends Webenq_Test_Model_Question_ClosedTest
{
    /**
     * @dataProvider provideValidData
     */
    public function testFactoryWithValidDataReturnsType($data)
    {
        $question = Webenq_Model_Question::factory($data);
    	$this->assertTrue($question instanceof Webenq_Model_Question_Closed_Percentage);
    }

    /**
     * @dataProvider provideInvalidData
     */
    public function testFactoryWithInvalidDataDoesNotReturnType($data)
    {
        $question = Webenq_Model_Question::factory($data);
        $this->assertFalse($question instanceof Webenq_Model_Question_Closed_Percentage);
    }
}