<?php

class DashboardController extends MasterController
{

    function runBeforeAction()
    {
        if ($_SESSION['is_admin'] ?? false == true) {
            return true;
        }
        // echo 'Not logged in.';
        // return false;

        // prevent infinite loop
        $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
        if ($action != 'login') {

            // header('Location: /admin/index.php?module=dashboard&action=login');
            header('Location: /myCMStwo/public/admin/index.php?module=dashboard&action=login');
        } else {
            return true;
        }
    }

    function defaultAction()
    {

        echo "Welcome to the administration";
    }

    function loginAction()
    {
        if ($_POST['postAction'] ?? 0 == 1) {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // check validation PASSWORD
            $validatus = new Validation();

            if (!$validatus
                ->addRule(new ValidateMin(3))
                ->addRule(new ValidateMax(20))
                ->addRule(new ValidateSpecialChar())
                ->validate($password)) {
                $_SESSION['validationRules']['error'] = "Password must be between 3 and 20 chars and must contain one special character.";
            }
            if (!$validatus
                ->addRule(new ValidateMin(3))
                ->addRule(new ValidateEmail())
                ->validate($username)) {
                $_SESSION['validationRules']['error'] = "Everythang bout ur email is wrong.";
            }


            if (($_SESSION['validationRules']['error'] ?? '') == '') {
                // lesson9 31:37 implement authentication
                $auth = new Auth();
                if ($auth->checkLogin($username, $password)) {
                    // all is good
                    $_SESSION['is_admin'] = 1;
                    header('Location: /myCMStwo/public/admin/index.php');
                    exit();
                }
                $_SESSION['validationRules']['error'] = "Username or password is incorrect.";
            }  // var_dump('git rehkt');

        }


        include VIEW_PATH . 'admin/login.html';
        unset($_SESSION['validationRules']['error']);
    }
}
