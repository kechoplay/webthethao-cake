<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Danhmuc Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cats
 * @property \Cake\ORM\Association\BelongsTo $ParentDanhmuc
 * @property \Cake\ORM\Association\HasMany $ChildDanhmuc
 *
 * @method \App\Model\Entity\Danhmuc get($primaryKey, $options = [])
 * @method \App\Model\Entity\Danhmuc newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Danhmuc[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Danhmuc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Danhmuc findOrCreate($search, callable $callback = null, $options = [])
 */
class DanhmucTable extends Table
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

        $this->setTable('danhmuc');
        $this->setDisplayField('cat_name');
        $this->setPrimaryKey('cat_id');

        $this->addBehavior('Tree', [
            'left' => 'sort_order',
            'right' => 'sort_order'
        ]);

        $this->belongsTo('Danhmuc', [
            'foreignKey' => 'cat_id',
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
            ->requirePresence('cat_name', 'create')
            ->notEmpty('cat_name');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmpty('sort_order');

        $validator
            ->boolean('cat_status')
            ->requirePresence('cat_status', 'create')
            ->notEmpty('cat_status');

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
        $rules->add($rules->existsIn(['cat_id'], 'Danhmuc'));
        return $rules;
    }

    public function asd()
    {
    }
}
