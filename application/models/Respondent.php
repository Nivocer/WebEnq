<?php
class Webenq_Model_Respondent extends Respondent
{
    /**
     * Class constructor
     *
     * Defaults to new entry
     *
     * @param Doctrine_Table $table
     * @param bool $isNewEntry
     */
    public function __construct($table = null, $isNewEntry = true)
    {
        parent::__construct($table, $isNewEntry);
    }
}