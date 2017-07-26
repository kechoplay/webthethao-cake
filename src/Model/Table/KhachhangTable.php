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

        $this->setTable('khachhang');
        $this->setDisplayField('cus_id');
        $this->setPrimaryKey('cus_id');

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
            ->minLength('password', '6', 'The password more than 6 charactor')
            ->requirePresence('password', 'create')
            ->notEmpty('password')
            ->add('password', 'validFormat', [
                'rule' => array('custom', '/^[A-Z]{1}[a-zA-Z0-9]{6,32}$/'),
                'message' => 'Password must be starting with letters in hoa and words from 6 to 32 characters'
            ]);

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->email('email', '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', 'Your password is not in the correct format')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->minLength('mobile', '9')
            ->numeric('mobile', 'Your mobile is not in the correct format')
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
        $rules->add($rules->isUnique(['username'],['message'=>'The username has been used']));
        $rules->add($rules->isUnique(['email'],['message'=>'The email has been used']));

//        $rules->addCreate()

        return $rules;
    }

    public function checkusername($username){

    }
}
