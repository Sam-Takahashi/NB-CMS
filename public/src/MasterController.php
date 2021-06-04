<?php


class MasterController
{

    function runAction($actionName)
    {
        if (method_exists($this, 'runBeforeAction')) {
            // prevents backtracking to form page
            $results = $this->runBeforeAction();
            if ($results == false) {
                return;
            }
        }

        $actionName .= 'Action';
        if (method_exists($this, $actionName)) {
            $this->$actionName();
        } else {
            include 'view/status-pages/404.html';
        }
    }
}
