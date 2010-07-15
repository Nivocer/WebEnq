<?php

/* Set time zone */
date_default_timezone_set('Europe/Amsterdam');

/* Define path to application directory */
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

/* Define application environment */
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', 'unit-testing');
    
/* Ensure library/ is on include_path */
set_include_path(implode(PATH_SEPARATOR, array(
	realpath(APPLICATION_PATH . '/../libraries'),
	realpath(APPLICATION_PATH . '/../../nivocer-thirdparty'),
	realpath('/var/www/3rdparty'),
	realpath(APPLICATION_PATH . '/../classes'),
    get_include_path(),
)));

/* set up auto-loading */
require_once "Zend/Loader/Autoloader.php";
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->registerNamespace('HVA_');
$resourceLoader = new Zend_Loader_Autoloader_Resource(array(
	'basePath'  => APPLICATION_PATH,
	'namespace' => 'HVA',
));
$resourceLoader->addResourceType('model', 'models', 'Model');
$resourceLoader->addResourceType('form', 'forms', 'Form');
$resourceLoader->addResourceType('test', '../tests/application', 'Test');
$resourceLoader->addResourceType('test_model', '../tests/application/models', 'Test_Model');

Zend_Session::$_unitTestEnabled = true;
Zend_Session::start();

/* Bootstrap application */
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap();
