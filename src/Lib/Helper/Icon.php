<?php
namespace Shelf\Lib\Helper;

class Icon
{
    use \Phacil\Common\Traits\InstanceTrait;

    public function __construct()
    {
        self::$instance = $this;
        return $this;
    }
    /**
     * Tag for icon
     * 
     * @param String $class
     * @return String
     */
    public function i($class)
    {
        return '<i class="'.$class.'"></i>';
    }
    /**
     * Load Font Awesome Icon
     * 
     * @param String $icon
     * @return String
     */
    public function fa($icon)
    {
        return $this->i('fa fa-' .$icon);
    }
}