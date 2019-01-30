<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UserLogins Controller
 *
 * @property \App\Model\Table\UserLoginsTable $UserLogins
 *
 * @method \App\Model\Entity\UserLogin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserLoginsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $userLogins = $this->paginate($this->UserLogins);

        $this->set(compact('userLogins'));
    }

    /**
     * View method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userLogin = $this->UserLogins->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userLogin', $userLogin);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userLogin = $this->UserLogins->newEntity();
        if ($this->request->is('post')) {
            $userLogin = $this->UserLogins->patchEntity($userLogin, $this->request->getData());
            if ($this->UserLogins->save($userLogin)) {
                $this->Flash->success(__('The user login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user login could not be saved. Please, try again.'));
        }
        $users = $this->UserLogins->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLogin', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userLogin = $this->UserLogins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userLogin = $this->UserLogins->patchEntity($userLogin, $this->request->getData());
            if ($this->UserLogins->save($userLogin)) {
                $this->Flash->success(__('The user login has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user login could not be saved. Please, try again.'));
        }
        $users = $this->UserLogins->Users->find('list', ['limit' => 200]);
        $this->set(compact('userLogin', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Login id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userLogin = $this->UserLogins->get($id);
        if ($this->UserLogins->delete($userLogin)) {
            $this->Flash->success(__('The user login has been deleted.'));
        } else {
            $this->Flash->error(__('The user login could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
