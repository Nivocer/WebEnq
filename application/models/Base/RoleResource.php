<?php

/**
 * Webenq_Model_Base_RoleResource
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $role_id
 * @property integer $resource_id
 * @property Webenq_Model_Role $Role
 * @property Webenq_Model_Resource $Resource
 * 
 * @package    Webenq
 * @subpackage Models
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
abstract class Webenq_Model_Base_RoleResource extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('role_resource');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('role_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
        $this->hasColumn('resource_id', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Webenq_Model_Role as Role', array(
             'local' => 'role_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'role_resource_role_id_fk'));

        $this->hasOne('Webenq_Model_Resource as Resource', array(
             'local' => 'resource_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE',
             'foreignKeyName' => 'role_resource_resource_id_fk'));
    }
}