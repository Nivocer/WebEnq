<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version2 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('user', 'api_key', 'string', '64', array(
             'fixed' => '0',
             'unsigned' => '',
             'primary' => '',
             'notnull' => '1',
             'autoincrement' => '',
             ));
    }

    public function down()
    {
        $this->removeColumn('user', 'api_key');
    }
}