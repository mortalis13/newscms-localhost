<?php

header('Content-Type: text/html; charset=utf-8');
ini_set("display_errors", true);
date_default_timezone_set("Europe/Kiev");

error_reporting(E_ALL);

define("SITE_NAME", "News Portal");

define("DB_DSN", "mysql:host=localhost;dbname=cms_db;charset=utf8");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");

define("CLASS_PATH", "classes");
define("TEMPLATE_PATH", "templates");

define("IMAGES_PATH", "images/news/");
define("PREVIEW_IMAGES_PATH", "images/tmp/");
define("DEFAULT_IMAGE", "images/system/no-image.jpg");
define('PICTURE_SIZE_ALLOWED',2242880);
define('PICTURE_SIZE','Picture size must be less than 2MB');
define('SELECT_IMAGE','You can only upload jpg,jpeg,gif,png files');

define("PASS_SALT", "mortis");                  //for the pass hash
define("NEWS_ON_PAGE", 5);                     //how much news a user/admin can view on a page
define("MAX_PAGES", 5);                     //how much news a user/admin can view on a page
define("USER_LENGTH", 5);                       //username/password max length
define("PASS_LENGTH", 5);
define("DEFAULT_SORT", "date DESC");            //'news' table sort
define("MESSAGES_FILE", "files/messages/messages.ini");

define("DB_TABLE_PREFIX", "np_");
define("DB_NEWS_TABLE", "news");
define("DB_USER_TABLE", "users");

session_start();

function handleException($exception) {
  echo "Sorry, a problem occurred. Please contact administrator.";
  
  // echo "<br>";
  // echo $exception->getMessage();
  // echo "<br>";

  // echo "<pre>";
  // print_r($exception->getTrace());
  // echo "</pre>";

  error_log($exception->getMessage());
}
set_exception_handler('handleException');

function customAutoloader($class) {
  if($class=="URL") $class=strtolower($class);
  else $class=lcfirst($class);
  require_once 'classes/'.$class.'.class.php';
}
spl_autoload_register('customAutoloader');

?>
