<?php
namespace Shelf\Lib\Helper;

class L10n extends Common
{
    private $config;
    private $context = 'default';

    public function setConfig($config){
        $this->config = $config;
        return $this;
    }

    public function getConfig(){
        return $this->config;
    }

    public function setContext($context){
        $this->config = $context;
        return $this;
    }

    public function getContext(){
        return $this->context;
    }

    public function traduzir($chave)
    {
        if (isset($this->config[$this->context][$chave])) {
            return $this->config[$this->context][$chave];
        } else {
            return $this->config['default'][$chave];
        }
    }
}
