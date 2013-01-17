<?php

/**
 * Webenq_Model_Base_Questionnaire
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $category_id
 * @property string $default_language
 * @property timestamp $date_start
 * @property timestamp $date_end
 * @property integer $active
 * @property string $meta
 * @property int $weight
 * @property Webenq_Model_Category $Category
 * @property Doctrine_Collection $QuestionnaireTitle
 * @property Doctrine_Collection $QuestionnaireQuestion
 * @property Doctrine_Collection $Respondent
 * @property Doctrine_Collection $Report
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_Questionnaire extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('questionnaire');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('category_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => true,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('default_language', 'string', 2, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'en',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '2',
             ));
        $this->hasColumn('date_start', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '2012-01-01 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '25',
             ));
        $this->hasColumn('date_end', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '2050-01-01 00:00:00',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '25',
             ));
        $this->hasColumn('active', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '1',
             'notnull' => true,
             'autoincrement' => false,
             'length' => '1',
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
        $this->hasColumn('weight', 'int', null, array(
             'type' => 'int',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_Category as Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'RESTRICT',
             'onUpdate' => 'CASCADE'));

        $this->hasMany('Webenq_Model_QuestionnaireTitle as QuestionnaireTitle', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));

        $this->hasMany('Webenq_Model_QuestionnaireQuestion as QuestionnaireQuestion', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));

        $this->hasMany('Webenq_Model_Respondent as Respondent', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));

        $this->hasMany('Webenq_Model_Report as Report', array(
             'local' => 'id',
             'foreign' => 'questionnaire_id'));
    }
}