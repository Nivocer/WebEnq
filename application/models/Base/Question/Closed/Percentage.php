<?php

/**
 * Webenq_Model_Base_Question_Closed_Percentage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_Question_Closed_Percentage extends Webenq_Model_Question_Closed
{
    public function setTableDefinition()
    {
        parent::setTableDefinition();
        $this->setTableName('question__closed__percentage');
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}