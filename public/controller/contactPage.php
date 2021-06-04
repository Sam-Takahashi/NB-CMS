<?php

class ContactController extends MasterController
{

    function defaultAction()
    {
        include 'view/contact-us.html';
    }
    function submitFormAction()
    {
        // validate
        // store data
        // submit data, etc

        // show a thank you page
        include 'view/contact-us-ty-page.html';
    }
}
