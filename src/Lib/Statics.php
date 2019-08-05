<?php

namespace Shelf\Lib;

class Statics{

    public static $l10nLogCollection = null;

    /**
    * @return \Phacil\Common\Classes\Collection
    */
    public static function l10nLog($chave, $valor){
        try{
            if(is_null(self::$l10nLogCollection)){
                self::$l10nLogCollection = \phacil\collection([]);
            }
            self::$l10nLogCollection->add($chave, $valor);
        }catch(\Exception $e){            
        }
        return self::$l10nLogCollection;
    }
}
