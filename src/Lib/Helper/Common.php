<?php

namespace Shelf\Lib\Helper;

class Common
{
    use \Phacil\Common\Traits\InstanceTrait;

    public function __construct()
    {
        self::$instance = $this;
        return $this;
    }
}