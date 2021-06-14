<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'C:/xampp/htdocs/myCMStwo/src/Entity.php';
require_once 'C:/xampp/htdocs/myCMStwo/modules/page/models/Page.php';


class FakeStmt
{
    function execute()
    {
    }
    function fetch()
    {
        return [
            ['id' => 1, 'title' => 'fake title', 'content' => 'fake content']
        ];
    }
}
class FakeDBConnection
{
    function prepare()
    {
        return new FakeStmt();
    }
}

// $stmt = $this->dbc->prepare($sql);
// $stmt->execute(['value' => $fieldValue]);
// $databaseData = $stmt->fetch();

final class ActiveRecordTest extends TestCase
{
    public function findAll(): void
    {
        $fdbc = new FakeDBConnection();
        $page = new Page($fdbc);
        $results = $page->findAll();

        $this->assertEquals(1, count($results));
    }
}

//  ./vendor/bin/phpunit tests
//Run with (Cmd+Shift+P on OSX or Ctrl+Shift+P on Windows and Linux) and execute the PHPUnit Test command.