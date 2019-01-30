<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * News Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsToMany $Files
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsToMany $Tags
 * @property \App\Model\Table\NewsImagesTable|\Cake\ORM\Association\HasMany $NewsImages
 * @method \App\Model\Entity\News get($primaryKey, $options = [])
 * @method \App\Model\Entity\News newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\News[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\News|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\News patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\News[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\News findOrCreate($search, callable $callback = null, $options = [])
 */
class NewsTable extends Table
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

        $this->setTable('news');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Files', [
            'foreignKey' => 'news_id',
            'targetForeignKey' => 'file_id',
            'joinTable' => 'news_files'
        ]);
        $this->belongsToMany('Tags', [
            'foreignKey' => 'news_id',
            'targetForeignKey' => 'tag_id',
            'joinTable' => 'news_tags'
        ]);
        $this->hasMany('NewsImages', [
            'foreignKey' => 'news_id'
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
            ->maxLength('title', 60)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        $validator
            ->scalar('text')
            ->requirePresence('text', 'create')
            ->allowEmptyString('text', false);

        $validator
            ->boolean('feature')
            ->allowEmptyString('feature', false);

        $validator
            ->dateTime('date_submitted')

            ->allowEmptyDateTime('date_submitted', false);

        $validator
            ->dateTime('date_modified')

            ->allowEmptyDateTime('date_modified', false);

        $validator
            ->dateTime('date_approved')
            ->allowEmptyDateTime('date_approved');

        $validator
            ->dateTime('date_expires')
            ->allowEmptyDateTime('date_expires');

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
    public function findFeature(Query $query, array $options)
    {
        return $query->where(['feature' => '1'])->limit(1);
    }
}
