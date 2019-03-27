<?php

namespace Shelf\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Network\Session;

class LoggerBehavior extends Behavior
{

    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    public function getSessionUser() {
        $session = new Session();
        return $session->read('Auth.User');
    }

    private function arrayRecursiveDiff($aArray1, $aArray2)
    {
        $aReturn = array();

        foreach ($aArray1 as $mKey => $mValue) {
            if (array_key_exists($mKey, $aArray2)) {
                if (is_array($mValue)) {
                    $aRecursiveDiff = $this->arrayRecursiveDiff($mValue, $aArray2[$mKey]);
                    if (count($aRecursiveDiff)) {
                        $aReturn[$mKey] = $aRecursiveDiff;
                    }
                } else {
                    if ($mValue != $aArray2[$mKey]) {
                        $aReturn[$mKey] = $mValue;
                    }
                }
            } else {
                $aReturn[$mKey] = $mValue;
            }
        }
        return $aReturn;
    }

    public function afterSave(Event $event, Entity $entity, \ArrayObject $options)
    {

        $class = get_class($entity);

        if (!in_array($class, ['Shelf\\Model\\Entity\\ShelfLogRegistro', 'Shelf\\Entity\\Table\\ShelfLogDetalhe'])) {

            $registroTable = \Cake\ORM\TableRegistry::get('Shelf.ShelfLogRegistro');
            $logDetalheTable = \Cake\ORM\TableRegistry::get('Shelf.ShelfLogDetalhe');
            $log = $logDetalheTable->newEntity();

            // pr($registroTable ); exit;

            $data = \Cake\Routing\Router::getRequest()->getData();
            unset($data['_save']);
            if (empty($data)) {
                $data = $entity->toArray();
            }

            $diff = $entity->extractOriginalChanged(array_keys($data));

            //                $diff = $this->arrayRecursiveDiff($original, $data);

            $query = $registroTable->find('all')
                ->where(['modelo_pk' => $entity->id, 'modelo_table' => $class]);

            $registro = $query->first();

            if ( $entity->isNew() || is_null($registro)) {

                $registro = $registroTable->newEntity();

                $registro->modelo_table = $class;
                $registro->created = date('Y-m-d H:i:s');
                $registro->created_by = $this->getSessionUser()['id'];
            }
            // pr($registro);exit;
            if ($entity->isNew()) {
                $log->tipo_acao = 'Insert';
            } else {
                $log->dados_antigos = json_encode($diff);
                $log->tipo_acao = 'Update';                
            }

            $registro->created_by = $log->updated_by = $this->getSessionUser()['id'];
            $log->created = date('Y-m-d H:i:s');

            if ($registroTable->save($registro)) {
                //The $article entity contains the id now
                $registro_id = $registro->id;
                $log->shelf_log_registro_id  = $registro_id;
                // pr($log);exit;
                $logDetalheTable->save($log);
            }
        }
    }

    public function afterDelete(Event $event, Entity $entity, \ArrayObject $options)
    {

        $class = get_class($entity);

        if (!in_array($class, ['Shelf\\Model\\Entity\\ShelfRegistro', 'Shelf\\Model\\Entity\\ShelfLog'])) {
            $registroTable = \Cake\ORM\TableRegistry::get('Shelf.ShelfLogRegistro');
            $logDetalheTable = \Cake\ORM\TableRegistry::get('Shelf.ShelfLogDetalhe');
            $log = $logDetalheTable->newEntity();

            $query = $registroTable->find('all')
                ->where(['modelo_pk' => $entity->id, 'modelo_table' => $class]);

            $registro = $query->first();

            $log->tipo_acao = 'Delete';
            $log->created = date('Y-m-d H:i:s');

            $registro_id = $registro->id;
            $log->shelf_log_registro_id = $registro_id;

            if ($logDetalheTable->save($log)) {
                //TODO 
            }
        }
    }
}
