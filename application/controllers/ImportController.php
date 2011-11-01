<?php
/**
 * Controller class
 *
 * @package     Webenq
 * @subpackage  Controllers
 * @author      Bart Huttinga <b.huttinga@nivocer.com>
 */
class ImportController extends Zend_Controller_Action
{
    /**
     * Handles the importing of files
     *
     * @return void
     */
    public function indexAction()
    {
        $session = new Zend_Session_Namespace();
        $supportedFormats = Webenq_Import_Adapter_Abstract::$supportedFormats;

        $form = new Webenq_Form_Import($supportedFormats);
        $form->language->setValue($session->language);
        $errors = array();

        if ($this->_helper->form(isPostedAndValid($form))) {

            $data = $form->getValues();
            $session->language = $data['language'];

            if ($form->file->receive()) {
                $filename = $form->file->getFileName();
            } else {
                $errors[] = 'Error receiving the file';
            }

            if (!$errors) {

                /* set memory_limit */
                $key = 'memory_limit';
                $value = '512M';
                @ini_set($key, $value);
                if (!ini_get($key) == $value) {
                    throw new Exception("PHP-settings $key could not be set to $value!");
                }

                /* set max_execution_time */
                $key = 'max_execution_time';
                $value = 0;
                @ini_set($key, $value);
                if (!ini_get($key) == $value) {
                    throw new Exception("PHP-settings $key could not be set to $value!");
                }

                $adapter = Webenq_Import_Adapter_Abstract::factory($filename);
                $importer = Webenq_Import_Abstract::factory($data['type'], $adapter, $data['language']);
                $importer->import();
                $this->_redirect('/');
            }
        }

        $this->view->errors = $errors;
        $this->view->form = $form;
    }
}