<?php
class Webenq_Form_Questionnaire_Add extends Zend_Form
{
	public function init()
	{
		$this->addElements(array(
			$this->createElement('text', 'title', array(
				'label' => 'Titel:',
				'required' => true,
				'validators' => array(
					new Zend_Validate_NotEmpty(),
					new Zend_Validate_Alnum(true),
				),
			)),
			$this->createElement('submit', 'submit', array(
				'label' => 'opslaan',
			)),
		));
	}
}