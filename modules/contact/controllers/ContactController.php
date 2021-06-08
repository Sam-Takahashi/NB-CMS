<?php

class ContactController extends MasterController
{
    public function runBeforeAction()
    {
        // if the user has submitted the form return true or false
        if ($_SESSION['has_submitted_the_form'] ?? 0 == 1) {

            $dbh = DatabaseConnection::getInstance();
            $dbc = $dbh->getConnection();


            $pageObj = new Page($dbc);
            $pageObj->findBy('id', $this->entityId);
            $variables['pageObj'] = $pageObj;

            $temps = new Template('default');
            $temps->view('page/contact/views/static-page', $variables);

            return false;
        }
        return true;
    }

    function defaultAction()
    {

        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();

        // pageObj is a array[$id, $title, $content]
        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;

        $temps = new Template('default');
        $temps->view('contact/views/contact-us', $variables);
    }
    function submitFormAction()
    {
        // validate
        // store data
        // submit data, etc
        $_SESSION['has_submitted_the_form'] = 1;


        // $variables['title'] = 'Thank you for your message!';
        // $variables['content'] = 'We will get back to you in two business days.';
        $dbh = DatabaseConnection::getInstance();
        $dbc = $dbh->getConnection();


        $pageObj = new Page($dbc);
        $pageObj->findBy('id', $this->entityId);
        $variables['pageObj'] = $pageObj;

        $temps = new Template('default');
        $temps->view('page/contact/views/static-page', $variables);
    }
}
