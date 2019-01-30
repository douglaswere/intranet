<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissionGroups Model
 *
 * @property \App\Model\Table\PermissionsTable|\Cake\ORM\Association\HasMany $Permissions
 *
 * @method \App\Model\Entity\PermissionGroup get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissionGroup newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissionGroup[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissionGroup|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissionGroup|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissionGroup patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissionGroup[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissionGroup findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissionGroupsTable extends Table
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

        $this->setTable('permission_groups');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Permissions', [
            'foreignKey' => 'permission_group_id'
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

        return $validator;
    }
}
