<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Navmenus Model
 *
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\BelongsTo $Stores
 * @property \App\Model\Table\NavmenusTable|\Cake\ORM\Association\BelongsTo $Parentmenu
 * @property \App\Model\Table\NavmenusTable|\Cake\ORM\Association\HasMany $Childmenus
 *
 * @method \App\Model\Entity\Navmenu get($primaryKey, $options = [])
 * @method \App\Model\Entity\Navmenu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Navmenu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Navmenu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Navmenu|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Navmenu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Navmenu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Navmenu findOrCreate($search, callable $callback = null, $options = [])
 */
class NavmenusTable extends Table
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

        $this->setTable('navmenus');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Stores', [
            'foreignKey' => 'store_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Parentmenu', [
            'className'=>'Navmenus',
            'foreignKey' => 'navmenu_id'
        ]);
        $this->hasMany('Childmenus', [
            'className'=>'Navmenus',
            'foreignKey' => 'navmenu_id'
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
            ->scalar('title')
            ->maxLength('title', 30)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('destination')
            ->maxLength('destination', 150)
            ->allowEmptyString('destination');



        $validator
            ->nonNegativeInteger('sort')
            ->requirePresence('sort', 'create')
            ->allowEmptyString('sort', false);

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
        $rules->add($rules->existsIn(['navmenu_id'], 'Parentmenu'));

        return $rules;
    }
}
