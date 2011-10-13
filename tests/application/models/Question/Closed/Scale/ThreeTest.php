<?php
class Webenq_Test_Model_Question_Closed_Scale_ThreeTest extends Webenq_Test_Model_Question_Closed_ScaleTest
{
    /**
     * @dataProvider provideInvalidData
     */
    public function testFactoryWithInvalidDataDoesNotReturnType($data)
    {
        $question = Webenq_Model_Question::factory($data, 'nl');
    	$this->assertFalse($question instanceof Webenq_Model_Question_Closed_Scale_Three);
    }
}