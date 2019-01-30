<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsTags Model
 *
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\BelongsTo $News
 * @property \App\Model\Table\TagsTable|\Cake\ORM\Association\BelongsTo $Tags
 *
 * @method \App\Model\Entity\NewsTag get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsTag newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NewsTag[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsTag|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsTag|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsTag patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsTag[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsTag findOrCreate($search, callable $callback = null, $options = [])
 */
class NewsTagsTable extends Table
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

        $this->setTable('news_tags');
        $this->setDisplayField('news_id');
        $this->setPrimaryKey(['news_id', 'tag_id']);

        $this->belongsTo('News', [
            'foreignKey' => 'news_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id',
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
        $rules->add($rules->existsIn(['news_id'], 'News'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));

        return $rules;
    }
}
