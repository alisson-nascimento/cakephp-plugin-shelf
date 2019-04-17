<?php

namespace Shelf\Panel;

use Cake\Event\Event;
use Cake\Http\ServerRequest as Request;
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
        /* @var Request $request */
        $request = $event->getSubject()->request;
        if ($request) {
            $this->_data = ['content' => $request->getSession()->read()];
        }
    }
}