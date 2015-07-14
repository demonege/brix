<?php

namespace Mainpage\Model;

use \Zend\Db\Adapter\Adapter,
    \Zend\Db\TableGateway\TableGateway;

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

}

?>