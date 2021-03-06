<?php
// DIR_PATH
define('DIR_PATH', strtr(dirname(dirname(__FILE__)) . '/public/', array('\\'=>'/','\/'=>'/')));
define('ROOT_PATH', strtr(dirname(dirname(__FILE__)) . '/', array('\\'=>'/','\/'=>'/')));
// HTTP
if (isset($_SERVER['HTTP_HOST'])) {
	define('HTTP_PATH', strtr('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], array(strtr($_SERVER['SCRIPT_FILENAME'], array(DIR_PATH=>''))=>'')));
	define('HTTP_SERVER', HTTP_PATH);
	define('HTTP_IMAGE', HTTP_PATH . 'img/');

	// HTTPS
	// HTTPS
	if(isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))){
	define('HTTPS_PATH', strtr('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'], array(strtr($_SERVER['SCRIPT_FILENAME'], array(DIR_PATH=>''))=>'')));
	}else{
	define('HTTPS_PATH', HTTP_PATH);
	}
	define('HTTPS_SERVER', HTTPS_PATH);

	define('HTTPS_IMAGE', HTTPS_PATH . 'img/');

	define('DIR_IMAGE', DIR_PATH.'img/');
	define('DIR_IMAGCACHE', DIR_PATH.'img/cache');
	define('DIR_DOWNLOAD', DIR_PATH.'download/');
}


/*
define('ROOT_PATH', strtr(dirname(dirname(__FILE__)) . '/', array('\\'=>'/','\/'=>'/')));
// DIR
define('DIR_APPLICATION', ROOT_PATH.'catalog/');
define('DIR_SYSTEM', ROOT_PATH.'system/');
define('DIR_DATABASE', ROOT_PATH.'system/database/');
define('DIR_LANGUAGE', ROOT_PATH.'catalog/language/');
define('DIR_TEMPLATE', ROOT_PATH.'catalog/view/theme/');
define('DIR_CONFIG', ROOT_PATH.'system/config/');
define('DIR_IMAGE', ROOT_PATH.'image/');
define('DIR_CACHE', ROOT_PATH.'system/cache/');
define('DIR_DOWNLOAD', ROOT_PATH.'download/');
define('DIR_LOGS', ROOT_PATH.'system/logs/');
*/
?>