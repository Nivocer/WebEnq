<?php
/**
 * WebEnq4
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
 * @package    Webenq_Application
 * @copyright  Copyright (c) 2012 Nivocer B.V. (http://www.nivocer.com)
 * @license    http://www.gnu.org/licenses/agpl.html
 */

/**
 * Form class for user login
 *
 * @package    Webenq_Application
 * @author     Bart Huttinga <b.huttinga@nivocer.com>
 */
class Webenq_Form_User_Login extends Zend_Form
{
    /**
     * Builds the form.
     *
     * Adds elements, validators and filters to the form.
     */
    public function init()
    {
        $baseUrl = Zend_Controller_Front::getInstance()->getBaseUrl();
        $this->setAction("$baseUrl/user/login");

        $username= new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $redirect = new Zend_Form_Element_Hidden('redirect');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('login ');

        $this->addElements(array($username, $password, $redirect, $submit));
    }
}
