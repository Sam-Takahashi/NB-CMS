<?php
session_start();

define('ROOT_PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR);
define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR);
define('MODULE_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR);

define('ENCRYPTION_SALT', 'fkjdtw4554fkdsalf;21djsaf987978kdsasdkfj');

require_once ROOT_PATH . 'src/MasterController.php';
require_once ROOT_PATH . 'src/Template.php';
require_once ROOT_PATH . 'src/DatabaseConnection.php';
require_once ROOT_PATH . 'src/Entity.php';
require_once ROOT_PATH . 'src/Router.php';
require_once ROOT_PATH . 'src/Auth.php';
require_once ROOT_PATH . 'src/Validation.php';
require_once ROOT_PATH . 'src/validationRules/ValidateMin.php';
require_once ROOT_PATH . 'src/validationRules/ValidateMax.php';
require_once ROOT_PATH . 'src/validationRules/ValidateEmail.php';
require_once ROOT_PATH . 'src/validationRules/ValidateSpecialChar.php';
require_once MODULE_PATH . 'page/models/Page.php';
require_once MODULE_PATH . 'user/models/User.php';


// Connect to MySQL DB using driver invocation
DatabaseConnection::connect('localhost', 'darwin_cms', '3307', 'root', '');


// if / else routing logic
$module = $_GET['module'] ?? $_POST['module'] ?? 'dashboard';
$action = $_GET['action'] ?? $_POST['action'] ?? 'default';


if ($module == 'dashboard') {

    include MODULE_PATH . 'dashboard/admin/controllers/DashboardController.php';

    $dashboardController = new DashboardController();
    $dashboardController->runAction($action);
}
