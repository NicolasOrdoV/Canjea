<?php

require_once 'models/Street.php';

class  Streets
{
    static public function ctrSelectStreets()
    {
        $table = "barrio";
        $answer = Street::mdlSelectStreets($table);
        return $answer;
    }
}