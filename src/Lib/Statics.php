<?php

namespace Shelf\Lib;

class Statics{

    public static $logCollection = null;

    /**
    * @return \Phacil\Common\Classes\Collection
    */
    public static function log($chave, $valor){
        if(is_null(self::$logCollection)){
            self::$logCollection = \phacil\collection([]);            
        }
        self::$logCollection->add($chave, $valor);
        return self::$logCollection;
    }
}