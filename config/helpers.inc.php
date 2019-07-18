<?php
namespace shelf{

    use Shelf\Lib\Helper\L10n;
    /**
     * Undocumented function
     *
     * @return \Shelf\Lib\Helper\L10n
     */
    function l10n(){
        if(!is_null(L10n::getInstance())){
            return L10n::getInstance();
        }
        return new L10n();
    }
}

namespace shelf\icon{
    /**
     * Undocumented function
     *
     * @return \Shelf\Lib\Helper\Icon
     */
    function i($class){
        return \phacil\html\i()->class($class);
    }

    /**
     * Load Font Awesome Icon
     * 
     * @param String $icon
     * @return String
     */
    function fa($icon)
    {
        return i('fa fa-' .$icon);
    }

    /**
     * Load Pi Icon
     * 
     * @param String $icon
     * @return String
     */
    function pi($icon)
    {
        return i('pi-' .$icon);
    }
}