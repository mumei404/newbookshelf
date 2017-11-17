<?php

namespace App\Controller;

class UsersController extends AppController
{
    public function index()
    {
        $users = $this->Users->find('all');
        $this->set('users', $users);
    }

    public function add()
    {
        $user = $this->Users->newEntity();
        $this->set('user', $user);
        if (!$this->request->is('post')) {
            return $this->render();
        }
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if (!$this->Users->save($user)) {
            $this->Flash->error(__('Unable to add user'));
        }
        $this->Flash->success(__('successed'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        $this->set('user', $user);
        if (!$this->request->is(['patch', 'post', 'put'])) {
            return $this->render();
        }
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if (!$this->Users->save($user)) {
            $this->Flash->error(__('cannot save'));
        }
        $this->Flash->success(__('successed'));
        return $this->redirect(['action' => 'index']);
    }
}
