<?php
class Php{
    public static function Freelook(){
        echo static::getClass();
    }
    public static function getClass(){
        return __CLASS__;
    }

}

?>