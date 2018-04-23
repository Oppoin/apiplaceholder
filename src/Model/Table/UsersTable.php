<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('name');

        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

        // Setup search filter using search manager
        $this->searchManager()
            // Here we will alias the 'q' query param to search the `Articles.title`
            // field and the `Articles.content` field, using a LIKE match, with `%`
            // both before and after.
            ->add('q', 'Search.Like', [
                'before' => true,
                'after' => true,
                'fieldMode' => 'OR',
                'comparison' => 'LIKE',
                'wildcardAny' => '*',
                'wildcardOne' => '?',
                'field' => [
                    'name', 'username',
                    'email',
                    'address_street',
                    'address_suite',
                    'address_city',
                    'address_zipcode',
                    'address_geo_lat',
                    'address_geo_lng',
                    'phone',
                    'website',
                    'company_name',
                    'company_catchPhrase',
                    'company_bs',
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
            ->integer('id')
            ->allowEmpty('id');

        $validator
            ->allowEmpty('name');

        $validator
            ->allowEmpty('username');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->allowEmpty('address_street');

        $validator
            ->allowEmpty('address_suite');

        $validator
            ->allowEmpty('address_city');

        $validator
            ->allowEmpty('address_zipcode');

        $validator
            ->decimal('address_geo_lat')
            ->allowEmpty('address_geo_lat');

        $validator
            ->decimal('address_geo_lng')
            ->allowEmpty('address_geo_lng');

        $validator
            ->allowEmpty('phone');

        $validator
            ->allowEmpty('website');

        $validator
            ->allowEmpty('company_name');

        $validator
            ->allowEmpty('company_catchPhrase');

        $validator
            ->allowEmpty('company_bs');

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

        return $rules;
    }
}
