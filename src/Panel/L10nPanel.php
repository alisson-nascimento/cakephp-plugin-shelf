<?php

namespace Shelf\Panel;

use Cake\Event\Event;
use Cake\Core\Configure;
use DebugKit\DebugPanel;
use Shelf\Lib\Statics;

class L10nPanel extends DebugPanel
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
        $this->_data = ['content' => Statics::$l10nLogCollection];
    }
}
