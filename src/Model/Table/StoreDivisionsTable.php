<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StoreDivisions Model
 *
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\BelongsTo $Stores
 *
 * @method \App\Model\Entity\StoreDivision get($primaryKey, $options = [])
 * @method \App\Model\Entity\StoreDivision newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StoreDivision[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StoreDivision|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoreDivision|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StoreDivision patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StoreDivision[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StoreDivision findOrCreate($search, callable $callback = null, $options = [])
 */
class StoreDivisionsTable extends Table
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

        $this->setTable('store_divisions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('company_code')
            ->maxLength('company_code', 3)
            ->requirePresence('company_code', 'create')
            ->allowEmptyString('company_code', false);

        $validator
            ->scalar('ar_division_number')
            ->maxLength('ar_division_number', 2)
            ->requirePresence('ar_division_number', 'create')
            ->allowEmptyString('ar_division_number', false);

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
        $rules->add($rules->existsIn(['store_id'], 'Stores'));

        return $rules;
    }
}
