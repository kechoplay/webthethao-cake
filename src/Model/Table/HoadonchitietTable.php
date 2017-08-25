<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hoadonchitiet Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Hoadon
 * @property \Cake\ORM\Association\BelongsTo $Sanpham
 *
 * @method \App\Model\Entity\Hoadonchitiet get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hoadonchitiet newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hoadonchitiet[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hoadonchitiet|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hoadonchitiet patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hoadonchitiet[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hoadonchitiet findOrCreate($search, callable $callback = null, $options = [])
 */
class HoadonchitietTable extends Table
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

        $this->table('hoadonchitiet');
        $this->displayField('ord_id');
        $this->primaryKey(['ord_id', 'pro_id']);

        $this->belongsTo('Hoadon', [
            'foreignKey' => 'ord_id',
            'joinType' => 'INNER'
            ]);
        $this->belongsTo('Sanpham', [
            'foreignKey' => 'pro_id',
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
        ->integer('ord_id')
        ->requirePresence('number', 'create')
        ->notEmpty('number');

        $validator
        ->integer('pro_id')
        ->requirePresence('number', 'create')
        ->notEmpty('number');

        $validator
        ->integer('number')
        ->requirePresence('number', 'create')
        ->notEmpty('number');

        $validator
        ->numeric('price')
        ->requirePresence('price', 'create')
        ->notEmpty('price');

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
        $rules->add($rules->existsIn(['ord_id'], 'Hoadon'));
        $rules->add($rules->existsIn(['pro_id'], 'Sanpham'));

        return $rules;
    }

    public function addOrderDetail($sessioncart,$ord_id)
    {
        foreach ($sessioncart as $key => $value) {
            $billdetai=$this->newEntity();
            $id = $key;
            $price = $value['price'];
            $discount = $value['discount'];
            $quantity = $value['quantity'];
            $sl = $value['sl'];
            $lastprice=$price-$discount;
            $billdetai->pro_id = $id;
            $billdetai->ord_id = $ord_id;
            $billdetai->price = $lastprice;
            $billdetai->number = $sl;
            $this->save($billdetai);  
        }
    }
}
