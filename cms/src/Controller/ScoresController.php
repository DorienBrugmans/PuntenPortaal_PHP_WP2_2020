<?php

namespace App\Controller;

class ScoresController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $scores = $this->Paginator->paginate($this->Scores->find('all', ['contain' => 'Students']), ['limit' => '3']);
        $this->set(compact('scores'));
    }

    public function add()
    {
        $this->loadModel('Students');
        $students =  $this->Students->getAll();
        $studentsArray = $students->toArray();

        $score = $this->Scores->newEmptyEntity();
        if ($this->request->is('post')) {
            $score = $this->Scores->patchEntity($score, $this->request->getData());

            if ($this->Scores->save($score)) {
                $this->Flash->success(__('De nieuwe score voor deze student is toegevoegd.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('De nieuwe score voor deze student kon niet worden opgeslagen. Probeer opnieuw.'));
        }
        $this->set('score', $score);
        $this->set(compact('studentsArray'));
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $score = $this->Scores->get($id);
        if ($this->Scores->delete($score)) {
            $this->Flash->success(__('De score van de student voor het vak {0} is verwijderd.', $score->vak));
            return $this->redirect(['action' => 'index']);
        }
    }
}
