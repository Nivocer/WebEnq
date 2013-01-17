<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version8 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropForeignKey('questionnaire', 'questionnaire_category_id_category_id');
        $this->createForeignKey('questionnaire', 'questionnaire_category_id_category_id_1', array(
             'name' => 'questionnaire_category_id_category_id_1',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'category',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'RESTRICT',
             ));
        $this->addIndex('questionnaire', 'questionnaire_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
    }

    public function down()
    {
        $this->createForeignKey('questionnaire', 'questionnaire_category_id_category_id', array(
             'name' => 'questionnaire_category_id_category_id',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'category',
             'onUpdate' => 'CASCADE',
             'onDelete' => 'SET NULL',
             ));
        $this->dropForeignKey('questionnaire', 'questionnaire_category_id_category_id_1');
        $this->removeIndex('questionnaire', 'questionnaire_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
    }
}