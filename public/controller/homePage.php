<?php

class HomePageConrtoller extends MasterController
{
    function defaultAction()
    {
        $variables['title'] = 'Home page Title';
        $variables['content'] = 'Home page Content';

        $temps = new Template('default');
        $temps->view('static-page', $variables);
    }
}
