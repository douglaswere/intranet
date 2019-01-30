<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Blobs Model
 *
 * @property \App\Model\Table\FilesTable|\Cake\ORM\Association\HasMany $Files
 *
 * @method \App\Model\Entity\Blob get($primaryKey, $options = [])
 * @method \App\Model\Entity\Blob newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Blob[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Blob|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blob|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Blob patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Blob[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Blob findOrCreate($search, callable $callback = null, $options = [])
 */
class BlobsTable extends Table
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

        $this->setTable('blobs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Files', [
            'foreignKey' => 'blob_id'
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
            ->requirePresence('blob', 'create')
            ->allowEmptyString('blob', false);

        return $validator;
    }
}
