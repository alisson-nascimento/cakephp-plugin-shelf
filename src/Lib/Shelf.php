<?php
namespace Shelf\Lib;

use Shelf\Lib\Helper\Icon;
use Shelf\Lib\Helper\L10n;
use Phacil\HTML\HTML;

class Shelf 
{
    use \Phacil\Common\Traits\InstanceTrait;

    public function __construct()
    {
        self::$instance = $this;
        return $this;
    }

    /**
     * Undocumented function
     *
     * @return Icon
     */
    public function icon(){
        if(!is_null(Icon::getInstance())){
            return Icon::getInstance();
        }
        return new Icon();
    }
    
    /**
     * Undocumented function
     *
     * @return L10n
     */
    public function l10n(){
        if(!is_null(L10n::getInstance())){
            return L10n::getInstance();
        }
        return new L10n();
    }

    /**
     * Undocumented function
     *
     * @return HTML
     */
    public function html(){
        if(!is_null(HTML::getInstance())){
            return HTML::getInstance();
        }
        return new HTML();
    }
}
