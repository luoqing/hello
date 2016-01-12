
<?php

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR );
define('CONTROLLER_PATH', ROOT_PATH . 'controller' . DIRECTORY_SEPARATOR);
define("VIEW_PATH", ROOT_PATH ."view" . DIRECTORY_SEPARATOR);
define("MODEL_PATH", ROOT_PATH ."model" . DIRECTORY_SEPARATOR);
define("CONFIG_PATH", ROOT_PATH ."config" . DIRECTORY_SEPARATOR);
define("LIBRARY_PATH", ROOT_PATH ."library" . DIRECTORY_SEPARATOR);
define("ST_PATH", ROOT_PATH ."static" . DIRECTORY_SEPARATOR);
define("LOG_PATH", ROOT_PATH ."logs" . DIRECTORY_SEPARATOR);

// include CONFIG_PATH . "config.php";
include LIBRARY_PATH . "core.php";
include CONFIG_PATH . "config.php";

$params = $_REQUEST; 
Core::run($params);


