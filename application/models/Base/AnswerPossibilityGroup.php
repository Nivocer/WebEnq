<?php

/**
 * Webenq_Model_Base_AnswerPossibilityGroup
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property integer $number
 * @property enum $measurement_level
 * @property Doctrine_Collection $AnswerPossibility
 * @property Doctrine_Collection $QuestionnaireQuestion
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_AnswerPossibilityGroup extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('answerPossibilityGroup');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('name', 'string', 64, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '64',
             ));
        $this->hasColumn('number', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('measurement_level', 'enum', 10, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'metric',
              1 => 'non-metric',
             ),
             'primary' => false,
             'default' => 'non-metric',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '10',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Webenq_Model_AnswerPossibility as AnswerPossibility', array(
             'local' => 'id',
             'foreign' => 'answerPossibilityGroup_id'));

        $this->hasMany('Webenq_Model_QuestionnaireQuestion as QuestionnaireQuestion', array(
             'local' => 'id',
             'foreign' => 'answerPossibilityGroup_id'));
    }
}