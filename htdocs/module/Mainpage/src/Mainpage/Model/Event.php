<?php

namespace Mainpage\Model;

use Mainpage\Model\CalenderData;
use Mainpage\Model\Database;

class Event
{
    public $data = array();

    public function __construct($date)
    {
        //database connection
        $Database = new Database();
        $DatabaseAdapter = $Database->DatabaseConection();


        for($i=0;$i < count($date);$i++)
        {
            $where = array(
            'DATE' => $date[$i]
            );

            $table = 'kalenderereignisse';
            $this->data[$i] = $Database->select($table,$DatabaseAdapter,$where);
        }
    }

    public function getSelect()
    {
        return $this->data;
    }
}

?>