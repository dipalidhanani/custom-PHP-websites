<?php
  define('DB_SERVER', 'localhost'); // eg, localhost - should not be empty for productive servers
  define('DB_SERVER_USERNAME', 'root');
  define('DB_SERVER_PASSWORD', '');
  define('DB_DATABASE', 'kids_db');
  define('USE_CONNECT', 'true'); // use persistent connections? 
  define("HTTP_BASE_URL","http://192.168.3.102/");
define("HTTP_BASE_DIR",dirname(dirname(__FILE__))."/");
define("WS_IMAGES",HTTP_BASE_URL."images/");
define("WS_CSS",HTTP_BASE_URL."css/");
define("WS_PRODUCT",HTTP_BASE_URL."products/");
?>