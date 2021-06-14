<?php

abstract class Entity
{

    protected $dbc;
    protected $tableName;
    protected $fields;

    abstract protected function initFields();

    protected function __construct($dbc, $tableName)
    {
        $this->dbc = $dbc;
        $this->tableName = $tableName;
        $this->initFields();
    }

    //-------------------------(pretty_url, about_us)
    public function findBy($fieldName, $fieldValue)
    {


        $sql = "SELECT * FROM " . $this->tableName .  " WHERE " . $fieldName . " = :value";
        // Prepared Statments and Bound Parameters
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['value' => $fieldValue]);
        $databaseData = $stmt->fetch();
        var_dump($databaseData);
        // $stmt->debugDumpParams();
        if ($databaseData) {
            $this->setValues($this, $databaseData);
            // $this refers to $pageObj
        }
    }

    public function findAll()
    {
        return $this->find();
    }

    private function find()
    {
        $results = [];
        $sql = "SELECT * FROM " . $this->tableName;
        // Prepared Statments and Bound Parameters
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();

        $databaseData = $stmt->fetchAll();

        // $stmt->debugDumpParams();
        if ($databaseData) {
            $className = static::class;
            foreach ($databaseData as $objectData) {
                $object = new $className($this->dbc);
                $object = $this->setValues($object, $objectData);
                $results[] = $object;
            }
        }
        return $results;
    }


    // lesson7 14:33
    public function setValues($object, $values)
    {
        foreach ($object->fields as $fieldName) {
            // set each property(id, module, action, etc) to the value with the key of the fieldname(declared in the Router.php?)
            $object->$fieldName = $values[$fieldName];
        }
        return $object;
        // $this->id = $values['id'];
        // $this->module = $values['module'];
        // $this->action = $values['action'];
        // $this->entity_id = $values['entity_id'];
        // $this->pretty_url = $values['pretty_url'];
    }
}

