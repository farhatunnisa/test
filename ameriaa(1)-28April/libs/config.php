<?php
// This is the main Web application configuration file
define('ENVIRONMENT', 'development');
error_reporting(E_ALL);
define('VERSION', '1.0');
date_default_timezone_set('asia/kolkata');
/*
 * @server = 0 is localhost
 * @server = 1 is live server
 */
$server = 0;
if($server == 0) {

define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/ameriaa/');
define("URL", "http://" . $_SERVER['HTTP_HOST'] . str_replace("index.php/", "", $_SERVER['REQUEST_URI']));
define('BASE', $_SERVER['DOCUMENT_ROOT']."/ameriaa/");
define('PATH', "http://".$_SERVER['HTTP_HOST']."/ameriaa/");
define('REALPATH', str_replace("index.php", "", realpath('index.php')));
define("THEMEURL", SITEURL."public/template/flaty/");
define("THEMEDIR", BASE."public/template/flaty/");
define("IMAGEURL", "http://" . $_SERVER['HTTP_HOST'] . '/ameriaa/ameriaa-admin/');
define("BACKTHEMEURL", "http://" . $_SERVER['HTTP_HOST'] . '/ameriaa/ameriaa-admin/public/template/flaty/');
define("CONTROLLERSDIR", BASE."controllers/");
define("MODELSDIR", BASE."models/");
define("LIBS", BASE."libs/");
define("CORE", BASE."core/");
define("VIEWSDIR", BASE."views/");
define("PLUGINSDIR", BASE."plugins/");
define("MODULESDIR", BASE."modules/");
define("SALT", "B9S4N8A7S3R9C3V9S5I7R3I9"); //dont't change salt key
define("TIMEZONE", "Asia/Calcutta");
define("DEFAULTCONTROLLER", "index");
define("DIRECT", true);

/*
 * Database connections
 * 
 */
define("DB_SERVER", "192.168.0.28");
define("DB_USERNAME", "ameriaa");
define("DB_PASSWORD", "ameriaa");
define("DB_NAME", "ameriaa");
define("DB_PORT", "5432");
define("DB_DRIVER", "PDO");
define("DB_PREFIX", "sg_");
define("DB_PCONNECT", TRUE);
define("DB_DEBUG", TRUE);
define("DB_CACHEON", FALSE);
define("DB_CHACHEDIR", "");
define("DB_CHARSET", "utf8");
define("DB_COLLAT", "utf8_general_ci");
define("DB_SWAPPRE", "B9S4N8A7S3R9C3V9S5I7R3I9");
define("DB_AUTOINIT", TRUE);
define("DB_STRCTON", FALSE);
    
} else {
define("SITEURL", "http://" . $_SERVER['HTTP_HOST'] . '/siriframework/');
define('BASE', $_SERVER['DOCUMENT_ROOT']."/siriframework/");
define('PATH', $_SERVER['DOCUMENT_ROOT']."/siriframework/");
define("THEMEURL", SITEURL."public/template/besmart/");
define("THEMEDIR", PATH."public/template/besmart/");
define("CONTROLLERSDIR", PATH."controllers/");
define("MODELSDIR", PATH."models/");
define("LIBS", PATH."libs/");
define("CORE", PATH."core/");
define("VIEWSDIR", PATH."views/");
define("PLUGINSDIR", PATH."plugins/");
define("MODULESDIR", PATH."modules/");
define("SALT", "");
define("TIMEZONE", "Asia/Calcutta");
define("DEFAULTCONTROLLER", "index");
define("DIRECT", true);

/*
 * Database connections
 * 
 */
define("DB_SERVER", "localhost");
define("DB_USERNAME", "si434_step2dance");
define("DB_PASSWORD", "{iQg]mQc3?dV");
define("DB_NAME", "si434_framework");
define("DB_PORT", "5432");
define("DB_DRIVER", "PDO");
define("DB_PREFIX", "siri_");
define("DB_PCONNECT", TRUE);
define("DB_DEBUG", TRUE);
define("DB_CACHEON", FALSE);
define("DB_CHACHEDIR", "");
define("DB_CHARSET", "utf8");
define("DB_COLLAT", "utf8_general_ci");
define("DB_SWAPPRE", "");
define("DB_AUTOINIT", TRUE);
define("DB_STRCTON", FALSE); 
}
?>
