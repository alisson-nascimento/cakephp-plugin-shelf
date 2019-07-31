<?php

namespace Shelf\Lib;

class Statics{

    public static $logCollection = null;

    /**
    * @return \Phacil\Common\Classes\Collection
    */
    public static function log($chave, $valor){
        try{
            if(is_null(self::$logCollection)){
                self::$logCollection = \phacil\collection([]);
            }
            self::$logCollection->add($chave, $valor);
        }catch(\Exception $e){            
        }
        return self::$logCollection;
    }
}
