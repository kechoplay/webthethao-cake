<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SanphamTable extends Table
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('sanpham');
        $this->setDisplayField('pro_id');
        $this->setPrimaryKey('pro_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sanpham', [
            'foreignKey' => 'pro_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Danhmuc', [
            'foreignKey' => 'cat_id'
        ]);
    }

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
            ->requirePresence('pro_discount', 'create');

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
            ->boolean('pro_status')
            ->requirePresence('pro_status', 'create')
            ->notEmpty('pro_status');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['pro_id'], 'Sanpham'));
        $rules->add($rules->existsIn(['cat_id'], 'Danhmuc'));

        return $rules;
    }

    public function getlistProduct($where=null,$order=null,$limit=null)
    {
//        if (is_array($where)) {
//            $where = (count($where) ? implode(' and ', $where) : '');
//        } else {
//            $where = $where;
//        }

        if (is_null($order)) {
            $order = 'pro_name asc';
        } else {
            $order = $order;
        }

        return $this->find()
            ->where($where)
            ->order($order)
            ->limit($limit)
            ->toArray();
    }
}
