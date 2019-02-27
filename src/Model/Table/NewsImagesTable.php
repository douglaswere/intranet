<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsImages Model
 *
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\BelongsTo $News
 *
 * @method \App\Model\Entity\NewsImage get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsImage newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NewsImage[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsImage|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsImage|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsImage patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsImage[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsImage findOrCreate($search, callable $callback = null, $options = [])
 */
class NewsImagesTable extends Table
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

        $this->setTable('news_images');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('News', [
            'foreignKey' => 'news_id',
            'joinType' => 'INNER',
            'cascadeCallbacks'=>true
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
            ->maxLength('name', 100)
            ->allowEmptyString('name');

        $validator
            ->integer('size')
            ->allowEmptyString('size');

        $validator
            ->scalar('tmp_name')
            ->maxLength('tmp_name', 100)
            ->allowEmptyString('tmp_name');

        $validator
            ->scalar('height')
            ->maxLength('height', 45)
            ->allowEmptyString('height');

        $validator
            ->scalar('width')
            ->maxLength('width', 45)
            ->allowEmptyString('width');

        $validator
            ->scalar('feature')
            ->maxLength('feature', 45)
            ->allowEmptyString('feature');

        $validator
            ->scalar('url')
            ->allowEmptyString('url');

        $validator
            ->scalar('style')
            ->allowEmptyString('style');

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
        $rules->add($rules->existsIn(['news_id'], 'News'));

        return $rules;
    }
}
