<?php

namespace Mainpage\Model;

use Mainpage\Model\Database;


class CalenderData
{
    public function __construct($fieldData)
    {
        $timestamp = $this->createdTimestamp($fieldData['datum']);


    }

    public function createdTimestamp($date)
    {
        $date = str_replace('.','-',$date);
        $timestamp = strtotime($date);

        return $timestamp;
    }
}