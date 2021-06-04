<?php

class AboutUsController extends MasterController
{
    function defaultAction()
    {
        $variables['title'] = 'About Us page Title';
        $variables['content'] = 'About Us page Content';

        $temps = new Template('default');
        $temps->view('static-page', $variables);
    }
}
