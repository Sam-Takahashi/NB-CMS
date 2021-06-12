<?php

class PageController extends MasterController
{

    function runBeforeAction()
    {
        if ($_SESSION['is_admin'] ?? false == true) {
            return true;
        }

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
        $this->template->view('page/admin/views/page-list', $variables);
    }
}
