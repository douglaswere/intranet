<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PermissionsRoles Controller
 *
 * @property \App\Model\Table\PermissionsRolesTable $PermissionsRoles
 *
 * @method \App\Model\Entity\PermissionsRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PermissionsRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Roles', 'Permissions']
        ];
        $permissionsRoles = $this->paginate($this->PermissionsRoles);

        $this->set(compact('permissionsRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id Permissions Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permissionsRole = $this->PermissionsRoles->get($id, [
            'contain' => ['Roles', 'Permissions']
        ]);

        $this->set('permissionsRole', $permissionsRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permissionsRole = $this->PermissionsRoles->newEntity();
        if ($this->request->is('post')) {
            $permissionsRole = $this->PermissionsRoles->patchEntity($permissionsRole, $this->request->getData());
            if ($this->PermissionsRoles->save($permissionsRole)) {
                $this->Flash->success(__('The permissions role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissions role could not be saved. Please, try again.'));
        }
        $roles = $this->PermissionsRoles->Roles->find('list', ['limit' => 200]);
        $permissions = $this->PermissionsRoles->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('permissionsRole', 'roles', 'permissions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permissions Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permissionsRole = $this->PermissionsRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permissionsRole = $this->PermissionsRoles->patchEntity($permissionsRole, $this->request->getData());
            if ($this->PermissionsRoles->save($permissionsRole)) {
                $this->Flash->success(__('The permissions role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permissions role could not be saved. Please, try again.'));
        }
        $roles = $this->PermissionsRoles->Roles->find('list', ['limit' => 200]);
        $permissions = $this->PermissionsRoles->Permissions->find('list', ['limit' => 200]);
        $this->set(compact('permissionsRole', 'roles', 'permissions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permissions Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permissionsRole = $this->PermissionsRoles->get($id);
        if ($this->PermissionsRoles->delete($permissionsRole)) {
            $this->Flash->success(__('The permissions role has been deleted.'));
        } else {
            $this->Flash->error(__('The permissions role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
