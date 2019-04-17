<?php

namespace Shelf\Panel;

use Cake\Event\Event;
use Cake\Core\Configure;
use DebugKit\DebugPanel;

class ConfigurePanel extends DebugPanel
{
    public $plugin = 'Shelf';

     /**
     * shutdown callback
     *
     * @param \Cake\Event\Event $event The event
     * @return void
     */
    public function shutdown(Event $event)
    {
        $this->_data = ['content' => Configure::read()];
    }
}