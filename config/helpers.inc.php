<?php
namespace shelf{

    use \Cake\Core\Configure;
     /**
     * Undocumented function
     *
     * @return \Shelf\Lib\Helper\L10n
     */
    function l10n($termo_chave){
        if(Configure::check('Shelf.L10n.'. $termo_chave)){
            $termo_traduzido = Configure::read('Shelf.L10n.'. $termo_chave);
        }else{
            $termo_traduzido = $termo_chave;
        }
        
        \Shelf\Lib\Statics::log($termo_chave, $termo_traduzido);
        return $termo_traduzido;
    }

    function l10n_binding($bindings){       
        if(!is_array($bindings)){
            $bindings = [$bindings];
        }
        return array_map("\shelf\l10n",  $bindings);
    }

    function t($termo, $bindings = null){
        if($bindings){
            return \phacil\raw(l10n($termo),l10n_binding($bindings));            
        }
        return l10n($termo);
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
