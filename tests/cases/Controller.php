<?php
abstract class Webenq_Test_Case_Controller extends Zend_Test_PHPUnit_ControllerTestCase
{
    // as in Webenq_Test_Case_Fixture
    public function loadDatabase() {
        global $doctrineConfig;
        Doctrine_Core::loadData($doctrineConfig['data_fixtures_path'], false);
    }

    public function setUp()
    {
        parent::setUp();

        // as in Webenq_Test_Case_Fixture
        global $doctrineConfig;
        Doctrine_Core::createDatabases();
        Doctrine_Core::createTablesFromModels($doctrineConfig['models_path']);

        $this->getFrontController()->setControllerDirectory(APPLICATION_PATH . '/controllers');
    }

    public function tearDown()
    {
        try {
            Doctrine_Core::dropDatabases();
            $this->databaseExists = false;
        } catch (Exception $e) {
        }

        parent::tearDown();
    }

}