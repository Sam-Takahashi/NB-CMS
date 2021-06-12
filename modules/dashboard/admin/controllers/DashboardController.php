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
        $variables = [];
        // $this->template->view('page/admin/views/page-list', $variables);
        header('Location: /myCMStwo/public/admin/index.php?module=page');
        exit();
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
                //                ->addRule(new ValidateNoEmptySpaces())
                //                ->addRule(new ValidateSpecialChar())
                ->validate($password)) {
                $_SESSION['validationRules']['error'] = $validatus->getAllErrorMessages();
            }
            if (!$validatus
                ->addRule(new ValidateMin(3))
                //               ->addRule(new ValidateEmail())
                ->validate($username)) {
                $_SESSION['validationRules']['error'] = $validatus->getAllErrorMessages();
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
                $_SESSION['validationRules']['error'] = $validatus->getAllErrorMessages();
            }  // var_dump('git rehkt');

        }


        include VIEW_PATH . 'admin/login.html';
        unset($_SESSION['validationRules']['error']);
    }
}
