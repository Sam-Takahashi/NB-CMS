<?php
// lesson part 5 
class Template
{
    private $layout;

    public function __construct($layout)
    {
        $this->layout = $layout;
    }

    // $template is called in the default.html file
    function view($template, $variables)
    {
        extract($variables);

        include VIEW_PATH . $this->layout . '.html';
    }
}
