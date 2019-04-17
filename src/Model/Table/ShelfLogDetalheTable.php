<?php
namespace Shelf\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Core\Configure;
/**
 * ShelfLogDetalhe Model
 *
 * @property \Shelf\Model\Table\ShelfRegistroTable|\Cake\ORM\Association\BelongsTo $ShelfRegistro
 *
 * @method \Shelf\Model\Entity\ShelfLog get($primaryKey, $options = [])
 * @method \Shelf\Model\Entity\ShelfLog newEntity($data = null, array $options = [])
 * @method \Shelf\Model\Entity\ShelfLog[] newEntities(array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfLog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Shelf\Model\Entity\ShelfLog|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Shelf\Model\Entity\ShelfLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfLog[] patchEntities($entities, array $data, array $options = [])
 * @method \Shelf\Model\Entity\ShelfLog findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ShelfLogDetalheTable extends Table
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

        $this->setTable('shelf_log_detalhe');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Search.Search');

        $this->belongsTo('ShelfLogRegistro', [
            'foreignKey' => 'shelf_log_registro_id',
            'joinType' => 'INNER',
            'className' => 'Shelf.ShelfLogRegistro'
        ]);

        $this->belongsTo('CreatedBy', [
            'foreignKey' => 'created_by_id',
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
            ->scalar('tipo_acao')
            ->maxLength('tipo_acao', 20)
            ->requirePresence('tipo_acao', 'create')
            ->notEmpty('tipo_acao');

        $validator
            ->integer('created_by_id')
            ->allowEmpty('created_by_id');

        $validator
            ->scalar('dados_antigos')
            ->allowEmpty('dados_antigos');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['shelf_log_registro_id'], 'ShelfLogRegistro'));

        return $rules;
    }
}
