<?php

class AboutUsController extends MasterController
{
    function defaultAction()
    {
        // $variables['title'] = 'About Us page Title';
        // $variables['content'] = 'About Us page Content';
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObj = new Page($dbc);
        $pageObj->findById(2);
        $variables['pageObj'] = $pageObj;


        $temps = new Template('default');
        $temps->view('static-page', $variables);
    }
}
