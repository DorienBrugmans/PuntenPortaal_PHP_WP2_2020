<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StudentsTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('Students');
        $this->setDisplayField('naam');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->hasMany('Scores', [
            'foreignKey' => 'studenten_id'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('naam')
            ->maxLength('naam', 50, __('De naam mag niet meer dan 50 karakters bedragen.'))
            ->minLength('naam', 3, __('De naam moet minstens 3 karakters bedragen.'))
            ->requirePresence('naam', 'create')
            ->notEmptyString('naam', __('Naam is verplicht.'));

        $validator
            ->scalar('adres')
            ->maxLength('adres', 50, __('De adres mag niet meer dan 50 karakters bedragen.'))
            ->minLength('adres', 3, __('De adres moet minstens 3 karakters bedragen.'))
            ->requirePresence('adres', 'create')
            ->notEmptyString('adres', __('Adres is verplicht.'));

        $validator
            ->scalar('telefoon')
            ->maxLength('telefoon', 13, __('Het telefoonnummer mag niet meer dan 13 cijfers bedragen.'))
            ->minLength('telefoon', 9, __('Het telefoonnummer moet minstens 9 cijfers bedragen.'))
            ->requirePresence('telefoon', 'create')
            ->notEmptyString('telefoon', __('Telefoon is verplicht.'));

        return $validator;
    }


    public function getAll()
    {
        return $this->find('list');
    }
}
