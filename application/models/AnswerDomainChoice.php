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
 * @package    Webenq_Models
 * @copyright  Copyright (c) 2012 Nivocer B.V. (http://www.nivocer.com)
 * @license    http://www.gnu.org/licenses/agpl.html
 */

/**
 * Answer domain class definition
 *
 *
 * @package    Webenq_Models
 * @subpackage
 * @author     Nivocer <webenq@nivocer.com>
 */
class Webenq_Model_AnswerDomainChoice extends Webenq_Model_Base_AnswerDomainChoice
{
//todo merge with getAvailablePresentations (not yet implemented in this class
public static function getAvailablePrestentationMethods(){
        return array(
            t('Zend_Form_Element_Radio'),
            t('Zend_Form_Element_Select'),
            t('ZendX_JQuery_Form_Element_Slider'),
            t('Zend_Form_Element_MultiCheckbox'),
            t('Zend_Form_Element_Text'),
            t('ZendX_JQuery_Form_Element_AutoComplete')
        );
    }
}