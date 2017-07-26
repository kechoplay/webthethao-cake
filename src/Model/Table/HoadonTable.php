<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hoadon Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ords
 * @property \Cake\ORM\Association\BelongsTo $Khachhang
 *
 * @method \App\Model\Entity\Hoadon get($primaryKey, $options = [])
 * @method \App\Model\Entity\Hoadon newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Hoadon[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hoadon|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Hoadon patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Hoadon[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hoadon findOrCreate($search, callable $callback = null, $options = [])
 */
class HoadonTable extends Table
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

        $this->setTable('hoadon');
        $this->setDisplayField('name');
        $this->setPrimaryKey('ord_id');

        $this->belongsTo('Khachhang', [
            'foreignKey' => 'cus_id',
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
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->numeric('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->dateTime('ord_date')
            ->requirePresence('ord_date', 'create')
            ->notEmpty('ord_date');

        $validator
            ->requirePresence('ord_payment', 'create')
            ->notEmpty('ord_payment');

        $validator
            ->integer('ord_status')
            ->requirePresence('ord_status', 'create')
            ->notEmpty('ord_status');

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
        $rules->add($rules->existsIn(['cus_id'], 'Khachhang'));

        return $rules;
    }
}
