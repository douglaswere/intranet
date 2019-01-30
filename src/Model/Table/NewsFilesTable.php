<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * NewsFiles Model
 *
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\BelongsTo $News
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\BelongsTo $Files
 *
 * @method \App\Model\Entity\NewsFile get($primaryKey, $options = [])
 * @method \App\Model\Entity\NewsFile newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\NewsFile[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\NewsFile|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsFile|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\NewsFile patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\NewsFile[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\NewsFile findOrCreate($search, callable $callback = null, $options = [])
 */
class NewsFilesTable extends Table
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

        $this->setTable('news_files');
        $this->setDisplayField('news_id');
        $this->setPrimaryKey(['news_id', 'file_id']);

        $this->belongsTo('News', [
            'foreignKey' => 'news_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Files', [
            'foreignKey' => 'file_id',
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
        $rules->add($rules->existsIn(['file_id'], 'Files'));

        return $rules;
    }
}
