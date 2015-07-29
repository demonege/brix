<?php

namespace Mainpage\Model;

use Mainpage\Model\CalenderData;
use Mainpage\Model\Database;

class Event
{
    public $test = array();

    public function __construct($date)
    {
        //database connection
        $Database = new Database();
        $DatabaseAdapter = $Database->DatabaseConection();

        $timestamp = $this->createdTimestamp($date);
        $where = array(
            'DATE' => $timestamp
        );
        $table = 'kalenderereignisse';

        $GLOBALS['$test'] =  $Database->select($table,$DatabaseAdapter,$where);

    }

    public function createdTimestamp($date)
    {
        $date = str_replace('.','-',$date);
        $timestamp = strtotime($date);

        return $timestamp;
    }

    public function getSelect()
    {
        return $GLOBALS['$test'];
    }
}

?>