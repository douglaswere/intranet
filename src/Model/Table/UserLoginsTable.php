<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UserLogins Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UserLogin get($primaryKey, $options = [])
 * @method \App\Model\Entity\UserLogin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UserLogin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UserLogin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserLogin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UserLogin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UserLogin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UserLogin findOrCreate($search, callable $callback = null, $options = [])
 */
class UserLoginsTable extends Table
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

        $this->setTable('user_logins');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->scalar('ip_address')
            ->maxLength('ip_address', 15)
            ->allowEmptyString('ip_address');

        $validator
            ->scalar('browser')
            ->maxLength('browser', 200)
            ->allowEmptyString('browser');

        $validator
            ->scalar('resolution')
            ->maxLength('resolution', 15)
            ->allowEmptyString('resolution');

        $validator
            ->scalar('login_code')
            ->maxLength('login_code', 6)
            ->allowEmptyString('login_code');

        $validator
            ->scalar('login_token')
            ->maxLength('login_token', 64)
            ->allowEmptyString('login_token');

        $validator
            ->dateTime('login_token_expires')
            ->allowEmptyDateTime('login_token_expires');

        $validator
            ->scalar('login_remember_me')
            ->maxLength('login_remember_me', 128)
            ->allowEmptyString('login_remember_me');

        $validator
            ->dateTime('login_remember_me_expires')
            ->allowEmptyDateTime('login_remember_me_expires');

        $validator
            ->dateTime('login_success')
            ->allowEmptyDateTime('login_success');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
