<?php
namespace Shelf\Controller;

use Shelf\Controller\AppController;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;

/**
 * Log Controller
 *
 * @property \Shelf\Model\Table\ShelfLogRegistroTable $ShelfLogRegistro
 *
 * @method \Shelf\Model\Entity\ShelfLogRegistro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->loadModel('Shelf.ShelfLogRegistro');
        $logs = $this->paginate($this->ShelfLogRegistro
                                    ->find('search', ['search' => $this->request->getQueryParams()])
                                    ->contain(['CreatedBy', 'UpdatedBy'])
                                );

        $this->set(compact('logs'));
    }

    /**
     * View method
     *
     * @param string|null $id ShelfLog id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('Shelf.ShelfLogRegistro');
        $log = $this->ShelfLogRegistro->get($id, [
            'contain' => ['ShelfLogDetalhe'=>['CreatedBy'], 'CreatedBy', 'UpdatedBy']
        ]);

        $this->set('log', $log);
    }

    
    public function history($modelo_table,  $modelo_pk)
    {
        $this->loadModel('Shelf.ShelfLogRegistro');
        $log = $this->ShelfLogRegistro
                    ->find()
                    ->contain(['ShelfLogDetalhe'=>['CreatedBy'], 'CreatedBy', 'UpdatedBy'])
                    ->where(function (QueryExpression $exp, Query $q) use ($modelo_table, $modelo_pk){
                        return $exp->like('modelo_table', '%'. $modelo_table)
                                    ->eq('modelo_pk', $modelo_pk)
                                    ;
                    })->first();
                    
        $this->set('log', $log);
    }
}
