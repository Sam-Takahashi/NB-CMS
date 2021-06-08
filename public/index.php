<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);

require_once ROOT_PATH . 'src/MasterController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'model/Page.php';


// Connect to MySQL DB using driver invocation
DatabaseConnection::connect('localhost', 'darwin_cms', '3307', 'root', '');



// if / else routing logic

// $section = $_GET['section'] ?? $_POST['section'] ?? 'home';
// $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
$action = $_GET['seo_name'] ?? 'home';



$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();

$router = new Router($dbc);
$router->findBy('pretty_url', $action);

// echo '<br>';
// var_dump($router);
// echo '</br>';

$action = $router->action != '' ? $router->action : 'default';

// var_dump($action);

$moduleName = ucfirst($router->module) . 'Controller';

if (file_exists(ROOT_PATH . 'controller/' . $moduleName . '.php')) {

  include ROOT_PATH . 'controller/' . $moduleName . '.php';
  $controller = new $moduleName();
  $controller->setEntityId($router->entity_id);
  $controller->runAction($action);
}

// if ($router->module == 'page') {
//   // calling about-us page
//   include ROOT_PATH . 'controller/PageController.php';
//   $pageController = new PageController();
//   $pageController->setEntityId($router->entity_id);
//   $pageController->runAction($action);
// } else if ($section == 'contact') {

//   // calling contact-us page
//   include ROOT_PATH . 'controller/ContactPage.php';
//   $contactController = new ContactController();
//   $contactController->runAction($action);
// } else {
//   // calling home page
//   include ROOT_PATH . 'controller/HomePage.php';
//   $homePageController = new HomePageConrtoller();
//   $homePageController->runAction($action);
// }
