<?php
/**
 * Controller class
 *
 * @package     Webenq
 * @subpackage  Controllers
 * @author      Bart Huttinga <b.huttinga@nivocer.com>
 */
class ReportElementController extends Zend_Controller_Action
{
    /**
     * Controller actions that are ajaxable
     *
     * @var array
     */
    public $ajaxable = array(
        'add' => array('html'),
        'edit' => array('html'),
        'delete' => array('html'),
    );

    /**
     * Renders the overview of report definitions
     */
    public function viewAction()
    {
        $report = $this->view->report = Doctrine_Core::getTable('Webenq_Model_Report')
            ->find($this->_request->id);
    }

    /**
     * Action for adding a report
     */
    public function addAction()
    {
        $report = Doctrine_Core::getTable('Webenq_Model_Report')->find($this->_request->report);

        $form = $this->view->form = new Webenq_Form_ReportElement_Add();
        $form->setAction($this->_request->getRequestUri());

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            $element = new Webenq_Model_ReportElement();
            $element->Report = $report;
            $element->data = serialize(array(
                'type' => $form->getValue('type'),
            ));
            $element->sort = 1 + $report->ReportElement->count();
            $element->save();

            $this->_redirect('report-element/edit/id/' . $element->id);
        }
    }

    /**
     * Action for editing a report
     */
    public function editAction()
    {
        $element = Doctrine_Core::getTable('Webenq_Model_ReportElement')->find($this->_request->id);
        $data = unserialize($element->data);

        // get form
        switch ($data['type']) {
            case 'text':
                $form = new Webenq_Form_ReportElement_Edit_Text($element);
                break;
            case 'open question':
                $form = new Webenq_Form_ReportElement_Edit_OpenQuestion($element);
                break;
            case 'percentages table':
                $form = new Webenq_Form_ReportElement_Edit_PercentageTable($element);
                break;
            case 'mean table':
                $form = new Webenq_Form_ReportElement_Edit_MeanTable($element);
                break;
            case 'barchart and mean':
                $form = new Webenq_Form_ReportElement_Edit_BarchartAndMean($element);
                break;
            case 'response':
            	$form = new Webenq_Form_ReportElement_Edit_Response($element);
            	break;
            default:
                throw new Exception('Unknown element type ' . $data['type']);
        }

        // set action and populate form
        $form->setAction($this->_request->getRequestUri());
        $form->populate($data);

        // process form if posted and valid
        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {
            $data = array_merge($data, $form->getValues());
            $element->data = serialize($data);
            $element->save();

            if ($this->_request->isXmlHttpRequest()) {
                $this->_helper->json(array('reload' => true));
            } else {
                $this->_redirect('report/edit/id/' . $element->report_id);
            }
        }

        // assign to view
        $this->view->form = $form;
    }

    /**
     * Action for deleting a report element
     */
    public function deleteAction()
    {
        $element = Doctrine_Core::getTable('Webenq_Model_ReportElement')
            ->find($this->_request->id);

        $form = $this->view->form = new Webenq_Form_Confirm(
            $element->id, t('Are you sure you want to delete this report element?'));
        $form->setAction($this->_request->getRequestUri());

        if ($this->_request->isPost() && $form->isValid($this->_request->getPost())) {

            if ($this->_request->getPost('yes')) {
                $element->delete();
                $reload = true;
            } else {
                $reload = false;
            }

            if ($this->_request->isXmlHttpRequest()) {
                $this->_helper->json(array('reload' => $reload));
            } else {
                $this->_redirect('report/view/id/' . $element->report_id);
            }
        }
    }
}