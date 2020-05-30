<?php

namespace App\Controller;

class StudentsController extends AppController
{
    public function index()
    {
        $this->loadComponent('Paginator');
        $students = $this->Paginator->paginate($this->getStudents(), ['limit' => '3']);
        $this->set(compact('students'));
    }

    public function getStudents()
    {
        return $this->Students->find();
    }

    public function view($id = null)
    {
        $student = $this->Students->get($id, ['contain' => ['Scores']]);
        $this->set(compact('student'));
    }

    public function add()
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->getData());

            if ($this->Students->save($student)) {
                $this->Flash->success(__('De nieuwe student is toegevoegd.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('De student kon niet worden opgeslagen. Probeer opnieuw.'));
        }
        $this->set('student', $student);
    }

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);

        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('De student {0} is verwijderd.', $student->naam));
            return $this->redirect(['action' => 'index']);
        }
    }
}
