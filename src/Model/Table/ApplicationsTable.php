<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applications Model
 *
 * @property \App\Model\Table\NodesTable&\Cake\ORM\Association\BelongsTo $Nodes
 * @property \App\Model\Table\ApplicationLogsTable&\Cake\ORM\Association\HasMany $ApplicationLogs
 *
 * @method \App\Model\Entity\Application newEmptyEntity()
 * @method \App\Model\Entity\Application newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Application[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Application get($primaryKey, $options = [])
 * @method \App\Model\Entity\Application findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Application patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Application[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Application|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Application saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Application[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('applications');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Nodes', [
            'foreignKey' => 'node_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('ApplicationLogs', [
            'foreignKey' => 'application_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('default_state')
            ->maxLength('default_state', 255)
            ->requirePresence('default_state', 'create')
            ->notEmptyString('default_state');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['node_id'], 'Nodes'), ['errorField' => 'node_id']);

        return $rules;
    }
}
