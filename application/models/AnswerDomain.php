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
 * @package    Webenq_Models
 * @author     Jaap-Andre de Hoop <j.dehoop@nivocer.com>, Rolf Kleef <r.kleef@nivocer.com>
 */
class Webenq_Model_AnswerDomain extends Webenq_Model_Base_AnswerDomain
{
    /**
     * Return the available answer domain types
     *
     * @return Array List of available answer domain types
     */
    public static function getAvailableTypes()
    {
        return array(
            'Choice' => array(
                'label' => ''
            ),
            'Numeric' => array(
                'label' => ''
            ),
            'Text' => array(
                'label' => ''
            )
        );
    }

    /**
     * Return the available presentation formats
     *
     * @return Array List of available presentation formats
     */
    public static function getAvailablePresentations()
    {
        return array(
            'Text' => array(
                'label' => ''
            )
        );
    }

    /**
     * Return the available validators for the answer domain type.
     *
     * @return Array List of available validators
     */
    public static function getAvailableValidators()
    {
        return array();
    }

    /**
     * Return the available filters for the answer domain type.
     *
     * @return Array List of available filters
     */
    public static function getAvailableFilters()
    {
        return array();
    }
}