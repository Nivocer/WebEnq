<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Webenq_Model_Respondent', 'doctrine');

/**
 * Webenq_Model_Base_Respondent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $questionnaire_id
 * @property Webenq_Model_Questionnaire $Questionnaire
 * @property Doctrine_Collection $Answer
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: Respondent.php,v 1.5 2011/10/28 13:01:38 bart Exp $
 */
abstract class Webenq_Model_Base_Respondent extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('respondent');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('questionnaire_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_Questionnaire as Questionnaire', array(
             'local' => 'questionnaire_id',
             'foreign' => 'id'));

        $this->hasMany('Webenq_Model_Answer as Answer', array(
             'local' => 'id',
             'foreign' => 'respondent_id'));
    }
}