<?php

namespace Mainpage\Model;

use Mainpage\Model\Database;


class CalenderData
{
    public function __construct($fieldData)
    {
        $table = 'kalenderereignisse';
        $timestamp = $this->createdTimestamp($fieldData['datum']);
        $Database = new Database();
        $DatabseAdapter = $Database->DatabaseConection();

        $values = array(
            'ID'        =>      '',
            'CONTENT'   =>      $fieldData['name'],
            'DATE'      =>      $timestamp
        );

        $Database->inserInto($DatabseAdapter,$values,$table);

    }

    public function createdTimestamp($date)
    {
        $date = str_replace('.','-',$date);
        $timestamp = strtotime($date);

        return $timestamp;
    }
}