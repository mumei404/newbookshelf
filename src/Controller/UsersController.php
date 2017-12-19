<?php

namespace App\Controller;

class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['login', 'add']);
    }

    public function index()
    {
        $user = $this->Auth->user();
        $this->set('user', $user);
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
        $this->login();
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

    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('id:{0} deleted', h($id)));
            $this->logout();
        }
        $this->Flash->error(__('cannot delete'));
        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
        if (!$this->request->is('post')) {
            return $this->render();
        }
        $user = $this->Auth->identify();
        if (!$user) {
            $this->Flash->error('ユーザ名またはパスワードが違います');
            return $this->render();
        }
        $this->Auth->setUser($user);
        $this->Flash->success('ログインしました');
        return $this->redirect($this->Auth->redirectUrl());
    }

    public function logout()
    {
        $this->Flash->success('ログアウトしました');
        return $this->redirect($this->Auth->logout());
    }
}
