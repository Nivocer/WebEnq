<?php

/**
 * Webenq_Model_Base_AnswerPossibilityTextSynonym
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $text
 * @property integer $answerPossibilityText_id
 * @property Webenq_Model_AnswerPossibilityText $AnswerPossibilityText
 * 
 * @package    Webenq_Models
 * @subpackage 
 * @author     Nivocer <webenq@nivocer.com>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_AnswerPossibilityTextSynonym extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('answerPossibilityTextSynonym');
        $this->hasColumn('text', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('answerPossibilityText_id', 'integer', null, array(
             'type' => 'integer',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_AnswerPossibilityText as AnswerPossibilityText', array(
             'local' => 'answerPossibilityText_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'answerPossibilityTextSynonym_answerPossibilityText_id_fk'));
    }
}