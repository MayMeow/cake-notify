<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicationLogs Model
 *
 * @property \App\Model\Table\ApplicationsTable&\Cake\ORM\Association\BelongsTo $Applications
 *
 * @method \App\Model\Entity\ApplicationLog newEmptyEntity()
 * @method \App\Model\Entity\ApplicationLog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationLog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationLog get($primaryKey, $options = [])
 * @method \App\Model\Entity\ApplicationLog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\ApplicationLog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationLog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ApplicationLog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationLog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ApplicationLog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ApplicationLog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\ApplicationLog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\ApplicationLog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ApplicationLogsTable extends Table
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

        $this->setTable('application_logs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applications', [
            'foreignKey' => 'application_id',
            'joinType' => 'INNER',
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
            ->scalar('current_state')
            ->maxLength('current_state', 255)
            ->requirePresence('current_state', 'create')
            ->notEmptyString('current_state');

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
        $rules->add($rules->existsIn(['application_id'], 'Applications'), ['errorField' => 'application_id']);

        return $rules;
    }
}
