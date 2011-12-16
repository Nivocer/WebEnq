<?php

/**
 * Webenq_Model_Base_AnswerPossibility
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $active
 * @property integer $answerPossibilityGroup_id
 * @property integer $value
 * @property Webenq_Model_AnswerPossibilityGroup $AnswerPossibilityGroup
 * @property Doctrine_Collection $Answer
 * @property Doctrine_Collection $AnswerPossibilityText
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: AnswerPossibility.php,v 1.14 2011/12/22 11:28:27 bart Exp $
 */
abstract class Webenq_Model_Base_AnswerPossibility extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('answerPossibility');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('active', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 1,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '1',
             ));
        $this->hasColumn('answerPossibilityGroup_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('value', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_AnswerPossibilityGroup as AnswerPossibilityGroup', array(
             'local' => 'answerPossibilityGroup_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'answerPossibility_answerPossibilityGroup_id_fk'));

        $this->hasMany('Webenq_Model_Answer as Answer', array(
             'local' => 'id',
             'foreign' => 'answerPossibility_id'));

        $this->hasMany('Webenq_Model_AnswerPossibilityText as AnswerPossibilityText', array(
             'local' => 'id',
             'foreign' => 'answerPossibility_id'));
    }
}