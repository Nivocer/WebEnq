<?php

/**
 * Webenq_Model_Base_Report
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $questionnaire_id
 * @property string $language
 * @property string $customer
 * @property integer $split_qq_id
 * @property string $output_dir
 * @property string $output_name
 * @property string $output_format
 * @property enum $orientation
 * @property Doctrine_Collection $ReportTitle
 * @property Webenq_Model_Questionnaire $Questionnaire
 * @property Webenq_Model_QuestionnaireQuestion $QuestionnaireQuestion
 * @property Doctrine_Collection $ReportElement
 * 
 * @package    Webenq_Models
 * @subpackage 
 * @author     Nivocer <webenq@nivocer.com>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_Report extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('report');
        $this->hasColumn('questionnaire_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('language', 'string', 5, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '5',
             ));
        $this->hasColumn('customer', 'string', 64, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '64',
             ));
        $this->hasColumn('split_qq_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('output_dir', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('output_name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('output_format', 'string', 5, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '5',
             ));
        $this->hasColumn('orientation', 'enum', 1, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'a',
              1 => 'p',
              2 => 'l',
             ),
             'default' => 'a',
             'notnull' => true,
             'length' => '1',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Webenq_Model_ReportTitle as ReportTitle', array(
             'local' => 'id',
             'foreign' => 'report_id'));

        $this->hasOne('Webenq_Model_Questionnaire as Questionnaire', array(
             'local' => 'questionnaire_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'report_questionnaire_id_fk'));

        $this->hasOne('Webenq_Model_QuestionnaireQuestion as QuestionnaireQuestion', array(
             'local' => 'split_qq_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL',
             'onUpdate' => 'SET NULL',
             'foreignKeyName' => 'report_split_qq_id_fk'));

        $this->hasMany('Webenq_Model_ReportElement as ReportElement', array(
             'local' => 'id',
             'foreign' => 'report_id'));
    }
}