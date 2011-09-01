<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Webenq_Model_Answer', 'doctrine');

/**
 * Webenq_Model_Base_Answer
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $answerPossibility_id
 * @property string $text
 * @property integer $respondent_id
 * @property integer $questionnaire_question_id
 * @property timestamp $timestamp
 * @property Webenq_Model_AnswerPossibility $AnswerPossibility
 * @property Webenq_Model_QuestionnaireQuestion $QuestionnaireQuestion
 * @property Webenq_Model_Respondent $Respondent
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: Answer.php,v 1.4 2011/10/27 16:37:43 bart Exp $
 */
abstract class Webenq_Model_Base_Answer extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('answer');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('answerPossibility_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('text', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('respondent_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('questionnaire_question_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('timestamp', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_AnswerPossibility as AnswerPossibility', array(
             'local' => 'answerPossibility_id',
             'foreign' => 'id'));

        $this->hasOne('Webenq_Model_QuestionnaireQuestion as QuestionnaireQuestion', array(
             'local' => 'questionnaire_question_id',
             'foreign' => 'id'));

        $this->hasOne('Webenq_Model_Respondent as Respondent', array(
             'local' => 'respondent_id',
             'foreign' => 'id'));
    }
}