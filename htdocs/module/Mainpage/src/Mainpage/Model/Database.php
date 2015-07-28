<?php

namespace Mainpage\Model;

use \Zend\Db\Adapter\Adapter,
    \Zend\Db\TableGateway\TableGateway,
    \Zend\Db\Sql\Sql;

class Database
{
    public function DatabaseConection()
    {
        $adapter = new \Zend\Db\Adapter\Adapter(array(
            'driver' => 'Mysqli',
            'database' => 'brix',
            'username' => 'root',
            'hostname' => 'localhost',
            'password' => '',
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
        $sql = new Sql($DatabaseAdapter);
        $select = $sql->select();
        $select->from($table);
        $select->where($where);

        $selectString = $select->getSqlString();

        $escapeSelectString = str_replace('"', '', $selectString);

        $results = $DatabaseAdapter->query($escapeSelectString, Adapter::QUERY_MODE_EXECUTE);

        die(print_r($results->toArray()));
    }

}

?>