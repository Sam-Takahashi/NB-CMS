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

        // $stmt->debugDumpParams();
        if($databaseData){
            $this->setValues($databaseData);
        }
        $this->setValues($databaseData);
    }


    // lesson7 14:33
    public function setValues($values)
    {
        foreach ($this->fields as $fieldName) {
            // set each property(id, module, action, etc) to the value with the key of the fieldname(declared in the Router.php?)
            $this->$fieldName = $values[$fieldName];
        }

        // $this->id = $values['id'];
        // $this->module = $values['module'];
        // $this->action = $values['action'];
        // $this->entity_id = $values['entity_id'];
        // $this->pretty_url = $values['pretty_url'];
    }
}
