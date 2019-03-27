<?php
namespace Shelf\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;

/**
 * ShelfLogRegistro Model
 *
 * @property \Shelf\Model\Table\ShelfLogDetalheTable|\Cake\ORM\Association\HasMany $ShelfLogDetalhe
 *
 * @method \Shelf\Model\Entity\ShelfRegistro get($primaryKey, $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro newEntity($data = null, array $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro[] newEntities(array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro[] patchEntities($entities, array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfRegistro findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShelfLogRegistroTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('shelf_log_registro');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ShelfLogDetalhe', [
            'foreignKey' => 'shelf_log_registro_id',
            'className' => 'Shelf.ShelfLogDetalhe'
        ]);

        $this->belongsTo('CreatedBy', [
            'foreignKey' => 'created_by_id',
            'joinType' => 'INNER',
            'className' => Configure::read('Log.userModel')
        ]);

        $this->belongsTo('UpdatedBy', [
            'foreignKey' => 'updated_by_id',
            'joinType' => 'INNER',
            'className' => Configure::read('Log.userModel')
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('modelo_table')
            ->maxLength('modelo_table', 100)
            ->requirePresence('modelo_table', 'create')
            ->notEmpty('modelo_table');

        $validator
            ->integer('modelo_pk')
            ->requirePresence('modelo_pk', 'create')
            ->notEmpty('modelo_pk');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        // $validator
        //     ->integer('created_by_id')
        //     ->allowEmpty('created_by_id');

        // $validator
        //     ->integer('updated_by_id')
        //     ->allowEmpty('updated_by_id');

        return $validator;
    }
}
