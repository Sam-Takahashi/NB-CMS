<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);

define('ENCRYPTION_SALT', 'fkjdtw4554fkdsalf;21djsaf987978kdsasdkfj');

require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once MODULE_PATH . 'user/models/User.php';


// Connect to MySQL DB using driver invocation
DatabaseConnection::connect('localhost', 'darwin_cms', '3307', 'root', '');

$dbh = DatabaseConnection::getInstance();
$dbc = $dbh->getConnection();
$userObj = new User($dbc);

$userObj->findBy('username', 'admin');

$authObj = new Auth();
$userObj = $authObj->changeUserPassword($userObj, 'TopSecret');

var_dump($userObj);
