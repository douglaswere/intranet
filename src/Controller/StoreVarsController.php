<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoreVars Controller
 *
 * @property \App\Model\Table\StoreVarsTable $StoreVars
 *
 * @method \App\Model\Entity\StoreVar[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreVarsController extends AppController
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
        $storeVars = $this->paginate($this->StoreVars);

        $this->set(compact('storeVars'));
    }

    /**
     * View method
     *
     * @param string|null $id Store Var id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeVar = $this->StoreVars->get($id, [
            'contain' => ['Stores']
        ]);

        $this->set('storeVar', $storeVar);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storeVar = $this->StoreVars->newEntity();
        if ($this->request->is('post')) {
            $storeVar = $this->StoreVars->patchEntity($storeVar, $this->request->getData());
            if ($this->StoreVars->save($storeVar)) {
                $this->Flash->success(__('The store var has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store var could not be saved. Please, try again.'));
        }
        $stores = $this->StoreVars->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeVar', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Var id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeVar = $this->StoreVars->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storeVar = $this->StoreVars->patchEntity($storeVar, $this->request->getData());
            if ($this->StoreVars->save($storeVar)) {
                $this->Flash->success(__('The store var has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store var could not be saved. Please, try again.'));
        }
        $stores = $this->StoreVars->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeVar', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Var id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeVar = $this->StoreVars->get($id);
        if ($this->StoreVars->delete($storeVar)) {
            $this->Flash->success(__('The store var has been deleted.'));
        } else {
            $this->Flash->error(__('The store var could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
