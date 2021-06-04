<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/MasterController.php';
require_once ROOT_PATH . 'src/Template.php';

// if / else logic

$section = $_GET['section'] ?? $_POST['section'] ?? 'home';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($section == 'about-us') {
  // calling about-us page
  include ROOT_PATH . 'controller/aboutUsPage.php';
  $aboutController = new AboutUsController();
  $aboutController->runAction($action);
} else if ($section == 'contact') {

  // calling contact-us page
  include ROOT_PATH . 'controller/contactPage.php';
  $contactController = new ContactController();
  $contactController->runAction($action);
} else {
  // calling home page
  include ROOT_PATH . 'controller/homePage.php';
  $homePageController = new HomePageConrtoller();
  $homePageController->runAction($action);
}
