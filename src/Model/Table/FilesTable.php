<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Files Model
 *
 * @property \App\Model\Table\NewsTable|\Cake\ORM\Association\BelongsToMany $News
 * @property \App\Model\Table\StoresTable|\Cake\ORM\Association\BelongsToMany $Stores
 *
 * @method \App\Model\Entity\File get($primaryKey, $options = [])
 * @method \App\Model\Entity\File newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\File[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\File|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\File|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\File patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\File[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\File findOrCreate($search, callable $callback = null, $options = [])
 */
class FilesTable extends Table
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

        $this->setTable('files');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('News', [
            'foreignKey' => 'file_id',
            'targetForeignKey' => 'news_id',
            'joinTable' => 'news_files'
        ]);
        $this->belongsToMany('Stores', [
            'foreignKey' => 'file_id',
            'targetForeignKey' => 'store_id',
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
            ->scalar('src')
            ->requirePresence('src', 'create')
            ->allowEmptyString('src', false);

        $validator
            ->scalar('path')
            ->maxLength('path', 200)
            ->requirePresence('path', 'create')
            ->allowEmptyString('path', false);

        $validator
            ->scalar('type')
            ->requirePresence('type', 'create')
            ->allowEmptyString('type', false);

        $validator
            ->scalar('mime_type')
            ->maxLength('mime_type', 50)
            ->requirePresence('mime_type', 'create')
            ->allowEmptyString('mime_type', false);

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->allowEmptyString('name', false);

        $validator
            ->nonNegativeInteger('size')
            ->requirePresence('size', 'create')
            ->allowEmptyString('size', false);

        $validator
            ->nonNegativeInteger('width')
            ->allowEmptyString('width');

        $validator
            ->nonNegativeInteger('height')
            ->allowEmptyString('height');



        return $validator;
    }
}
