<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Webenq_Model_AnswerPossibilityText', 'doctrine');

/**
 * Webenq_Model_Base_AnswerPossibilityText
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $text
 * @property string $language
 * @property integer $answerPossibility_id
 * @property Webenq_Model_AnswerPossibility $AnswerPossibility
 * @property Doctrine_Collection $AnswerPossibilityTextSynonym
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 * @version    SVN: $Id: AnswerPossibilityText.php,v 1.4 2011/10/27 16:37:43 bart Exp $
 */
abstract class Webenq_Model_Base_AnswerPossibilityText extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('answerPossibilityText');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('text', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('language', 'string', 2, array(
             'type' => 'string',
             'length' => 2,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('answerPossibility_id', 'integer', 4, array(
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
        $this->hasOne('Webenq_Model_AnswerPossibility as AnswerPossibility', array(
             'local' => 'answerPossibility_id',
             'foreign' => 'id'));

        $this->hasMany('Webenq_Model_AnswerPossibilityTextSynonym as AnswerPossibilityTextSynonym', array(
             'local' => 'id',
             'foreign' => 'answerPossibilityText_id'));
    }
}