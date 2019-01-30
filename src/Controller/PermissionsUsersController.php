<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissionsUsers Controller
 *
 * @property \App\Model\Table\PermissionsUsersTable $PermissionsUsers
 *
 * @method \App\Model\Entity\PermissionsUser[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Permissions', 'Users']
        ];
        $permissionsUsers = $this->paginate($this->PermissionsUsers);

        $this->set(compact('permissionsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Permissions User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissionsUser = $this->PermissionsUsers->get($id, [
            'contain' => ['Permissions', 'Users']
        ]);

        $this->set('permissionsUser', $permissionsUser);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissionsUser = $this->PermissionsUsers->newEntity();
        if ($this->request->is('post')) {
            $permissionsUser = $this->PermissionsUsers->patchEntity($permissionsUser, $this->request->getData());
            if ($this->PermissionsUsers->save($permissionsUser)) {
                $this->Flash->success(__('The permissions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissions user could not be saved. Please, try again.'));
        }
        $permissions = $this->PermissionsUsers->Permissions->find('list', ['limit' => 200]);
        $users = $this->PermissionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('permissionsUser', 'permissions', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permissions User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissionsUser = $this->PermissionsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissionsUser = $this->PermissionsUsers->patchEntity($permissionsUser, $this->request->getData());
            if ($this->PermissionsUsers->save($permissionsUser)) {
                $this->Flash->success(__('The permissions user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissions user could not be saved. Please, try again.'));
        }
        $permissions = $this->PermissionsUsers->Permissions->find('list', ['limit' => 200]);
        $users = $this->PermissionsUsers->Users->find('list', ['limit' => 200]);
        $this->set(compact('permissionsUser', 'permissions', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permissions User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissionsUser = $this->PermissionsUsers->get($id);
        if ($this->PermissionsUsers->delete($permissionsUser)) {
            $this->Flash->success(__('The permissions user has been deleted.'));
        } else {
            $this->Flash->error(__('The permissions user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
