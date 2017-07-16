<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admin Model
 *
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, callable $callback = null, $options = [])
 */
class AdminTable extends Table
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

        $this->setTable('admin');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        $this->addBehavior('Timestamp',[
            'event'=>[
                'Model.beforeSave'=>[
                    'created_at'=>'new',
                    'last_access'=>'always'
                ]
            ]
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
            ->requirePresence('user', 'create')
            ->notEmpty('user');

        $validator
            ->requirePresence('pass', 'create')
            ->notEmpty('pass');

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->integer('level')
            ->notEquals('level','0','Please choose the level')
            ->requirePresence('level', 'create')
            ->notEmpty('level');

        $validator
            ->integer('status')
            ->notEquals('status','0','Please choose the status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

//        $validator
//            ->dateTime('created_at')
//            ->requirePresence('created_at', 'create')
//            ->notEmpty('created_at');
//
//        $validator
//            ->dateTime('last_access')
//            ->requirePresence('last_access', 'create')
//            ->notEmpty('last_access');

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
        $rules->add($rules->isUnique(['email'],['message'=>'The email has been used']));
        $rules->add($rules->isUnique(['user'],['message'=>'The user has been used']));

        return $rules;
    }

}
