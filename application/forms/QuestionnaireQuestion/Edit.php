<?php
class HVA_Form_QuestionnaireQuestion_Edit extends Zend_Form
{
	/**
	 * QuestionnaireQuestion instance
	 * 
	 * @var QuestionnaireQuestion $_questionnaireQuestion
	 */
	protected $_questionnaireQuestion;
	
	/**
	 * Constructor
	 * 
	 * @param QuestionnaireQuestion $questionnaireQuestion
	 * @param mixed $options
	 */
	public function __construct(QuestionnaireQuestion $questionnaireQuestion, $options = null)
	{
		$this->_questionnaireQuestion = $questionnaireQuestion;
		parent::__construct($options);
	}
	
	/**
	 * Initialises the form
	 * 
	 * @return void
	 */
	public function init()
	{
		$qq = $this->_questionnaireQuestion;
		$cp = $qq->CollectionPresentation[0];
		$rp = $qq->ReportPresentation[0];
		
		/* add subform for question's general settings */
		$generalForm = new Zend_Form_SubForm();
		$questionEditForm = new HVA_Form_Question_Edit($qq->Question);
		$generalForm->addSubForm($questionEditForm->getSubForm('text'), 'text');
		
		if ($qq->existsInMultipleQuestionnaires()) {
			$generalForm->addElement(
				$this->createElement('radio', 'change_globally', array(
					'label' => 'Hoe wilt u bovenstaande wijzigingen doorvoeren?',
					'value' => 'local',
					'multiOptions' => array(
						'local' => 'Huidige questionnaire',
						'global' => 'Alle questionnaires',
					),
					'order' => 10,
				))
			);
		} else {
			$generalForm->addElement(
				$this->createElement('hidden', 'change_globally', array(
					'value' => 'global',
				))
			);
		}
		
		$generalForm->addElement(
			$this->createElement('submit', 'submit', array(
				'label' => 'opslaan',
				'order' => 20,
			))
		);
		$this->addSubForm($generalForm, 'general');
		
		/* add subform for question's data-collection settings */		
		$answerForm = new Zend_Form_SubForm();
		$answerForm->addElements(array(
			$this->createElement('checkbox', 'useAnswerPossibilityGroup', array(
				'label' => 'Maak gebruik van vaste antwoordmogelijkheden:',
				'checked' => ($qq->answerPossibilityGroup_id) ? true : false,
			)),
			$this->createElement('select', 'answerPossibilityGroup_id', array(
				'label' => 'Selecteer een groep met antwoordmogelijkheden:',
				'multiOptions' => AnswerPossibilityGroup::getAll(),
				'value' => $qq->answerPossibilityGroup_id,
			)),
			$this->createElement('select', 'collectionPresentationType', array(
				'label' => 'Type:',
				'multiOptions' => Webenq::getCollectionPresentationTypes(),
				'value' => ($qq->answerPossibilityGroup_id) ? $cp->type : COLLECTION_PRESENTATION_OPEN_TEXT,
			)),
			$this->createElement('submit', 'submit', array(
				'label' => 'opslaan',
			)),
		));
		$this->addSubForm($answerForm, 'answers');
		
		/* add subform for question's data-collection settings */		
		$validationForm = new Zend_Form_SubForm();
		$validationForm->addElements(array(
			$this->createElement('multiCheckbox', 'filters', array(
				'label' => 'Filters:',
				'multiOptions' => Webenq::getFilters(),
				'value' => unserialize($cp->filters),
			)),
			$this->createElement('multiCheckbox', 'validators', array(
				'label' => 'Validatie:',
				'multiOptions' => Webenq::getValidators(),
				'value' => unserialize($cp->validators),
			)),
			$this->createElement('submit', 'submit', array(
				'label' => 'opslaan',
			)),
		));
		$this->addSubForm($validationForm, 'validation');
	}
	
	public function storeValues()
	{
		$qq = $this->_questionnaireQuestion;
		$cp = $qq->CollectionPresentation[0];
		
		$values = $this->getValues();
		
		/* check if the question texts have been modified */
		$isModifiedText = false;
		foreach ($qq->Question->QuestionText as $qt) {
			if (count($values['general']['text']) != $qq->Question->QuestionText->count()) {
				$isModifiedText = true;
				break;
			} elseif (!isset($values['general']['text'][$qt->language])) {
				$isModifiedText = true;
				break;
			} elseif ($values['general']['text'][$qt->language] !== $qt->text) {
				$isModifiedText = true;
				break;
			}
		}
		
		/**
		 * If text changes are set to be made locally, a copy of the
		 * question is made and assigned to the current questionnaire.
		 */
		if ($isModifiedText) {
			if ($values['general']['change_globally'] == 'local') {
				/* copy question */
				$question = new Question();
				unset($values['general']['change_globally']);
				foreach ($values['general']['text'] as $language => $text) {
					$qt = new QuestionText;
					$qt->text = $text;
					$qt->language = $language;
					$question->QuestionText[] = $qt;
				}
				$question->save();
				$qq->Question = $question;
			} else {
				foreach ($qq->Question->QuestionText as $qt) {
					if (!isset($values['general']['text'][$qt->language])) {
						$qt->delete();
					} else {
						$qt->text = $values['general']['text'][$qt->language];
						$qt->save();
					}
				}
			}
		}
		
		if ($values['answers']['useAnswerPossibilityGroup'] == 1) {
			$qq->answerPossibilityGroup_id = $values['answers']['answerPossibilityGroup_id'];
			$cp->type = $values['answers']['collectionPresentationType'];
		} else {
			$qq->answerPossibilityGroup_id = null;
			$cp->type = COLLECTION_PRESENTATION_OPEN_TEXT;
		}
		
    	$cp->filters = serialize($values['validation']['filters']);
    	$cp->validators = serialize($values['validation']['validators']);
    	$qq->save();
	}
}