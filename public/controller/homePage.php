<?php

class HomePageConrtoller extends MasterController
{
    function defaultAction()
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

// pageObj is a array[$id, $title, $content]
        $pageObj = new Page($dbc);
        $pageObj->findById(1);
        $variables['pageObj'] = $pageObj;

        $temps = new Template('default');
        $temps->view('static-page', $variables);
    }
}
