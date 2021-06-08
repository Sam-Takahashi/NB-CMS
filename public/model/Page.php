<?php

class Page extends Entity
{
    // public $id;
    // public $title;
    // public $content;
    // private $dbc;

    public function __construct($dbc)
    {
        $this->dbc = $dbc;

        $this->tableName = 'pages';

        $this->fields = [
            'id',
            'title',
            'content'
        ];
    }

    // public function findById($id)
    // {


    //     $sql = "SELECT * FROM pages WHERE id = :id";
    //     $stmt = $this->dbc->prepare($sql);
    //     $stmt->execute(['id' => $id]);
    //     $pageData = $stmt->fetch();


    //     $this->id = $pageData['id'];
    //     $this->title = $pageData['title'];
    //     $this->content = $pageData['content'];
    // }
}
