<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Webenq_Model_Questionnaire', 'doctrine');

/**
 * Webenq_Model_Base_Questionnaire
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $id
 * @property string $meta
 * @property Doctrine_Collection $QuestionnaireText
 * @property Doctrine_Collection $QuestionnaireQuestion
 * @property Doctrine_Collection $Respondent
 *
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: Questionnaire.php,v 1.4 2011/10/27 12:55:17 bart Exp $
 */
abstract class Webenq_Model_Base_Questionnaire extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('questionnaire');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('meta', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Webenq_Model_QuestionnaireTitle as QuestionnaireTitle', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));

        $this->hasMany('Webenq_Model_QuestionnaireQuestion as QuestionnaireQuestion', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));

        $this->hasMany('Webenq_Model_Respondent as Respondent', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));
    }
}