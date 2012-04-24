<?php

/**
 * Webenq_Model_Base_QuestionnaireQuestion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $question_id
 * @property integer $answerPossibilityGroup_id
 * @property integer $questionGroup_id
 * @property enum $type
 * @property string $meta
 * @property Webenq_Model_Questionnaire $Questionnaire
 * @property Webenq_Model_Question $Question
 * @property Webenq_Model_AnswerPossibilityGroup $AnswerPossibilityGroup
 * @property Webenq_Model_QuestionGroup $QuestionGroup
 * @property Doctrine_Collection $Answer
 * @property Doctrine_Collection $CollectionPresentation
 * @property Doctrine_Collection $Report
 * @property Doctrine_Collection $ReportPresentation
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_QuestionnaireQuestion extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('questionnaire_question');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('questionnaire_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('question_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('answerPossibilityGroup_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('questionGroup_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('type', 'enum', 8, array(
             'type' => 'enum',
             'fixed' => 0,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'open',
              1 => 'single',
              2 => 'multiple',
              3 => 'hidden',
             ),
             'primary' => false,
             'default' => 'open',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '8',
             ));
        $this->hasColumn('meta', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_Questionnaire as Questionnaire', array(
             'local' => 'questionnaire_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'questionnaire_question_questionnaire_id_fk'));

        $this->hasOne('Webenq_Model_Question as Question', array(
             'local' => 'question_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'questionnaire_question_question_id_fk'));

        $this->hasOne('Webenq_Model_AnswerPossibilityGroup as AnswerPossibilityGroup', array(
             'local' => 'answerPossibilityGroup_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'RESTRICT',
             'foreignKeyName' => 'questionnaire_question_answerPossibilityGroup_id_fk'));

        $this->hasOne('Webenq_Model_QuestionGroup as QuestionGroup', array(
             'local' => 'questionGroup_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'questionnaire_question_questionGroup_id_fk'));

        $this->hasMany('Webenq_Model_Answer as Answer', array(
             'local' => 'id',
             'foreign' => 'questionnaire_question_id'));

        $this->hasMany('Webenq_Model_CollectionPresentation as CollectionPresentation', array(
             'local' => 'id',
             'foreign' => 'questionnaire_question_id'));

        $this->hasMany('Webenq_Model_Report as Report', array(
             'local' => 'id',
             'foreign' => 'split_qq_id'));

        $this->hasMany('Webenq_Model_ReportPresentation as ReportPresentation', array(
             'local' => 'id',
             'foreign' => 'questionnaire_question_id'));
    }
}