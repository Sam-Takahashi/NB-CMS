<?php


class MasterController
{
    protected $entityId;

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

    // this function is to grab the entityId from the db and is called in the PageController
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;
    }
}
