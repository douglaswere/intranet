<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PermissionsUsers Model
 *
 * @property \App\Model\Table\PermissionsTable|\Cake\ORM\Association\BelongsTo $Permissions
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PermissionsUser get($primaryKey, $options = [])
 * @method \App\Model\Entity\PermissionsUser newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PermissionsUser[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PermissionsUser|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissionsUser|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PermissionsUser patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PermissionsUser[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PermissionsUser findOrCreate($search, callable $callback = null, $options = [])
 */
class PermissionsUsersTable extends Table
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

        $this->setTable('permissions_users');
        $this->setDisplayField('permissions_id');
        $this->setPrimaryKey(['permissions_id', 'user_id']);

        $this->belongsTo('Permissions', [
            'foreignKey' => 'permissions_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['permissions_id'], 'Permissions'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
