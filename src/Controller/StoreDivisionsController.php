<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoreDivisions Controller
 *
 * @property \App\Model\Table\StoreDivisionsTable $StoreDivisions
 *
 * @method \App\Model\Entity\StoreDivision[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreDivisionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stores']
        ];
        $storeDivisions = $this->paginate($this->StoreDivisions);

        $this->set(compact('storeDivisions'));
    }

    /**
     * View method
     *
     * @param string|null $id Store Division id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeDivision = $this->StoreDivisions->get($id, [
            'contain' => ['Stores']
        ]);

        $this->set('storeDivision', $storeDivision);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storeDivision = $this->StoreDivisions->newEntity();
        if ($this->request->is('post')) {
            $storeDivision = $this->StoreDivisions->patchEntity($storeDivision, $this->request->getData());
            if ($this->StoreDivisions->save($storeDivision)) {
                $this->Flash->success(__('The store division has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store division could not be saved. Please, try again.'));
        }
        $stores = $this->StoreDivisions->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeDivision', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Division id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeDivision = $this->StoreDivisions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storeDivision = $this->StoreDivisions->patchEntity($storeDivision, $this->request->getData());
            if ($this->StoreDivisions->save($storeDivision)) {
                $this->Flash->success(__('The store division has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store division could not be saved. Please, try again.'));
        }
        $stores = $this->StoreDivisions->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeDivision', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Division id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeDivision = $this->StoreDivisions->get($id);
        if ($this->StoreDivisions->delete($storeDivision)) {
            $this->Flash->success(__('The store division has been deleted.'));
        } else {
            $this->Flash->error(__('The store division could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
