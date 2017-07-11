<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Khachhang Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cuses
 *
 * @method \App\Model\Entity\Khachhang get($primaryKey, $options = [])
 * @method \App\Model\Entity\Khachhang newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Khachhang[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Khachhang|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Khachhang patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Khachhang[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Khachhang findOrCreate($search, callable $callback = null, $options = [])
 */
class KhachhangTable extends Table
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

        $this->table('khachhang');
        $this->displayField('cus_id');
        $this->primaryKey('cus_id');

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
            ->requirePresence('username', 'create')
            ->notEmpty('username');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('mobile', 'create')
            ->notEmpty('mobile');

        $validator
            ->requirePresence('address', 'create')
            ->notEmpty('address');

        $validator
            ->boolean('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['cus_id'], 'Khachhang'));

        return $rules;
    }
}
