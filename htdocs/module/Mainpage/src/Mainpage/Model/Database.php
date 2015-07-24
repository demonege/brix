<?php

namespace Mainpage\Model;

use \Zend\Db\Adapter\Adapter,
    \Zend\Db\TableGateway\TableGateway,
    \Zend\Db\Sql\Sql,
    \Zend\Db\Sql\Select;

class Database
{
    public function DatabaseConection()
    {
        $adapter = new \Zend\Db\Adapter\Adapter(array(
            'driver' => 'Mysqli',
            'database' => 'brix',
            'username' => 'root',
            'hostname' => 'localhost',
            'password' => ''
        ));

        return $adapter;
    }

    public function inserInto($adapter,$values,$table)
    {
        $insert = new \Zend\Db\TableGateway\TableGateway($table,$adapter);

        $insert->insert($values);
    }

    public function select($table,$DatabaseAdapter,$where)
    {
        $sql = new Sql($DatabaseAdapter,$table);
        $select = $sql->select();
        $select->where(array('DATE' => '1437688800'));

        $selectString = $sql->getSqlStringForSqlObject($select);

//        $results = $DatabaseAdapter->query($selectString, $DatabaseAdapter::QUERY_MODE_EXECUTE);


        $statement = $DatabaseAdapter->createStatement();
        $select->prepareStatement($DatabaseAdapter, $statement);
        $statement->execute();

        die(print_r($statement->getResource()));
    }

}

?>