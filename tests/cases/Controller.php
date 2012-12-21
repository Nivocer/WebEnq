<?php
/**
 * WebEnq4 Library
 *
 *  LICENSE
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   Webenq
 * @package    Webenq_Controllers
 * @copyright  Copyright (c) 2012 Nivocer B.V. (http://www.nivocer.com)
 * @license    http://www.gnu.org/licenses/agpl.html
 */

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