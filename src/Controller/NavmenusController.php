<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Navmenus Controller
 *
 * @property \App\Model\Table\NavmenusTable $Navmenus
 *
 * @method \App\Model\Entity\Navmenu[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NavmenusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->setLayout('home');
        $this->paginate = [
            'contain' => ['Stores','Parentmenu','Childmenus']
        ];
        $navmenus = $this->paginate($this->Navmenus);

        $this->set(compact('navmenus'));
    }

    /**
     * View method
     *
     * @param string|null $id Navmenu id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $navmenu = $this->Navmenus->get($id, [
            'contain' => ['Stores', 'Navmenus']
        ]);

        $this->set('navmenu', $navmenu);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->setLayout('home');
        $navmenu = $this->Navmenus->newEntity();
        if ($this->request->is('post')) {
            $navmenu = $this->Navmenus->patchEntity($navmenu, $this->request->getData());
            if ($this->Navmenus->save($navmenu)) {
                $this->Flash->success(__('The navmenu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The navmenu could not be saved. Please, try again.'));
        }
        $parentmenu = $this->Navmenus->Parentmenu->find('list', ['limit' => 200]);
        $stores = $this->Navmenus->Stores->find('list', ['limit' => 200]);
        $this->set(compact('navmenu', 'stores','parentmenu'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Navmenu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $navmenu = $this->Navmenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $navmenu = $this->Navmenus->patchEntity($navmenu, $this->request->getData());
            if ($this->Navmenus->save($navmenu)) {
                $this->Flash->success(__('The navmenu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The navmenu could not be saved. Please, try again.'));
        }
        $parentmenu = $this->Navmenus->Parentmenu->find('list', ['limit' => 200]);
        $stores = $this->Navmenus->Stores->find('list', ['limit' => 200]);
        $this->set(compact('navmenu', 'stores','parentmenu'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Navmenu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $navmenu = $this->Navmenus->get($id);
        if ($this->Navmenus->delete($navmenu)) {
            $this->Flash->success(__('The navmenu has been deleted.'));
        } else {
            $this->Flash->error(__('The navmenu could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
