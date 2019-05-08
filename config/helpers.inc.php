<?php

/**
 * 
 * @return \Shelf\Lib\Shelf
 */
function shelf()
{
    if(!is_null(\Shelf\Lib\Shelf::getInstance())){
        return \Shelf\Lib\Shelf::getInstance();
    }
    return new \Shelf\Lib\Shelf();
}

