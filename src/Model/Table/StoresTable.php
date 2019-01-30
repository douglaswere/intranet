<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Stores Model
 *
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\BelongsTo $ParentStores
 * @property \App\Model\Table\NavmenusTable|\Cake\ORM\Association\HasMany $Navmenus
 * @property \App\Model\Table\StoreDivisionsTable|\Cake\ORM\Association\HasMany $StoreDivisions
 * @property \App\Model\Table\StoreIpmapsTable|\Cake\ORM\Association\HasMany $StoreIpmaps
 * @property \App\Model\Table\StoreReturnsTable|\Cake\ORM\Association\HasMany $StoreReturns
 * @property \App\Model\Table\StoreSortfieldTable|\Cake\ORM\Association\HasMany $StoreSortfield
 * @property \App\Model\Table\StoreVarsTable|\Cake\ORM\Association\HasMany $StoreVars
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\HasMany $ChildStores
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 *
 * @method \App\Model\Entity\Store get($primaryKey, $options = [])
 * @method \App\Model\Entity\Store newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Store[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Store|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Store patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Store[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Store findOrCreate($search, callable $callback = null, $options = [])
 */
class StoresTable extends Table
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

        $this->setTable('stores');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('ParentStores', [
            'className' => 'Stores',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('Navmenus', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('StoreDivisions', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('StoreIpmaps', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('StoreReturns', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('StoreSortfield', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('StoreVars', [
            'foreignKey' => 'store_id'
        ]);
        $this->hasMany('ChildStores', [
            'className' => 'Stores',
            'foreignKey' => 'parent_id'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'store_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'stores_files'
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
            ->scalar('name')
            ->maxLength('name', 30)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->allowEmptyString('active', false);

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentStores'));

        return $rules;
    }
}
