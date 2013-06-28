<?php

/**
 * Webenq_Model_QuestionnaireQuestionNode
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    Webenq_Models
 * @subpackage ##SUBPACKAGE##
 * @author     Nivocer <webenq@nivocer.com>
 * @version    SVN: $Id: Builder.php,v 1.2 2011/07/12 13:39:03 bart Exp $
 */
class Webenq_Model_QuestionnaireQuestionNode extends Webenq_Model_Base_QuestionnaireQuestionNode
{
    public function render($format)
    {
        switch ($format) {
            case 'previewTab':
                return '';
            break;
            default:
                $presentationType=$this->QuestionnaireElement->options['options']['presentation'];
                $availableFormElements=$this->QuestionnaireElement->AnswerDomain->getAvailablePresentations();
                $formElement=$availableFormElements[$presentationType]['element'];
                $return=new $formElement('qq-'.$this->id);
                switch ($formElement) {
                case 'Zend_Form_Element_Radio':
                    $return->addMultiOptions($this->QuestionnaireElement->AnswerDomain->getAnswerOptionsArray());
                    break;
                case 'WebEnq4_Form_Element_Note':
                    break;
                case 'ZendX_JQuery_Form_Element_Slider':
                    $answerOptions=$this->QuestionnaireElement->AnswerDomain->getAnswerOptionsArray();
                    //@todo labels?
                    //@todo get min max from something
                    $min=1.0; $max=5.0; $value=3;
                    $return->setJQueryParams(array('min' => $min, 'max' => $max, 'value'=>$value));
                    break;
                case 'Zend_Form_Element_Text':
                    //@todo check which options to add
                    //width of textbox
                    if (isset($this->QuestionnaireElement->options['options']['presentationWidth'])) {
                        $return->setAttrib('size',$this->QuestionnaireElement->options['options']['presentationWidth']);
                    }
                    break;
                default:
                    //@todo throw exception
                    var_dump(__LINE__, __FILE__,  $formElement);
                }

                $return->setLabel($this->QuestionnaireElement->getTranslation('text'));
                return $return;
            break;
        }
    }
}