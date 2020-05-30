<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ScoresTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('Scores');
        $this->addBehavior('Timestamp');
        $this->belongsTo('Students', [
            'foreignKey' => 'studenten_id'
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

            $validator
            ->scalar('vak')
            ->maxLength('vak', 30, __('Vakbeschrijving is te lang. Deze mag niet meer dan 30 karakters bedragen.'))
            ->minLength('vak', 3, __('Vakbeschrijving is te kort. Deze moet minstens 3 karakters bedragen.'))
            ->requirePresence('vak', 'create')
            ->notEmptyString('vak', __('Vak is verplicht.'));

            $validator
            ->scalar('score')
            ->requirePresence('score', 'create')
            ->notEmpty('score', __('Score is verplicht.'));

        return $validator;
    }
}
