<?php

class PageController extends MasterController
{
    function defaultAction()
    {
        // $variables['title'] = 'About Us page Title';
        // $variables['content'] = 'About Us page Content';
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObj = new Page($dbc);
        //-------------($fieldName, $fieldValue)
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;


        $this->template->view('page/views/static-page', $variables);
    }
}
