<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sanpham Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pros
 * @property \Cake\ORM\Association\BelongsTo $Danhmuc
 *
 * @method \App\Model\Entity\Sanpham get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sanpham newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sanpham[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sanpham patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sanpham findOrCreate($search, callable $callback = null, $options = [])
 */
class SanphamTable extends Table
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

        $this->table('sanpham');
        $this->displayField('pro_id');
        $this->primaryKey('pro_id');

        $this->belongsTo('Sanpham', [
            'foreignKey' => 'pro_id',
            'joinType' => 'INNER'
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
            ->requirePresence('pro_name', 'create')
            ->notEmpty('pro_name');

        $validator
            ->numeric('pro_price')
            ->requirePresence('pro_price', 'create')
            ->notEmpty('pro_price');

        $validator
            ->numeric('pro_discount')
            ->requirePresence('pro_discount', 'create')
            ->notEmpty('pro_discount');

        $validator
            ->requirePresence('pro_image', 'create')
            ->notEmpty('pro_image');

        $validator
            ->requirePresence('pro_description', 'create')
            ->notEmpty('pro_description');

        $validator
            ->integer('pro_quantity')
            ->requirePresence('pro_quantity', 'create')
            ->notEmpty('pro_quantity');

        $validator
            ->integer('pro_count_buy')
            ->requirePresence('pro_count_buy', 'create')
            ->notEmpty('pro_count_buy');

        $validator
            ->integer('pro_view')
            ->requirePresence('pro_view', 'create')
            ->notEmpty('pro_view');

        $validator
            ->boolean('pro_status')
            ->requirePresence('pro_status', 'create')
            ->notEmpty('pro_status');

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
        $rules->add($rules->existsIn(['pro_id'], 'Sanpham'));
        $rules->add($rules->existsIn(['cat_id'], 'Danhmuc'));

        return $rules;
    }

    public function getlistProduct($where=null,$order=null,$start=null,$limit=null)
    {
        if (is_array($where)) {
            $where = (count($where) ? implode(' and ', $where) : '');
        } else {
            $where = $where;
        }

        if (is_null($order)) {
            $order = 'pro_name asc';
        } else {
            $order = $order;
        }

        if (is_numeric($start) && is_numeric($limit)) {
            $limit = 'limit ' . $start . ',' . $limit;
        } else
        {
            $limit='';
        }

        $sql="select * from sanpham a JOIN danhmuc b ON a.cat_id=b.cat_id ".$where." ".$order." ".$limit;
        return $this->find()->where($where)->order($order)->toArray();
    }
}
