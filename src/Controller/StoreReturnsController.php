<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoreReturns Controller
 *
 * @property \App\Model\Table\StoreReturnsTable $StoreReturns
 *
 * @method \App\Model\Entity\StoreReturn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreReturnsController extends AppController
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
        $storeReturns = $this->paginate($this->StoreReturns);

        $this->set(compact('storeReturns'));
    }

    /**
     * View method
     *
     * @param string|null $id Store Return id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeReturn = $this->StoreReturns->get($id, [
            'contain' => ['Stores']
        ]);

        $this->set('storeReturn', $storeReturn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storeReturn = $this->StoreReturns->newEntity();
        if ($this->request->is('post')) {
            $storeReturn = $this->StoreReturns->patchEntity($storeReturn, $this->request->getData());
            if ($this->StoreReturns->save($storeReturn)) {
                $this->Flash->success(__('The store return has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store return could not be saved. Please, try again.'));
        }
        $stores = $this->StoreReturns->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeReturn', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Return id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeReturn = $this->StoreReturns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storeReturn = $this->StoreReturns->patchEntity($storeReturn, $this->request->getData());
            if ($this->StoreReturns->save($storeReturn)) {
                $this->Flash->success(__('The store return has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store return could not be saved. Please, try again.'));
        }
        $stores = $this->StoreReturns->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeReturn', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Return id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeReturn = $this->StoreReturns->get($id);
        if ($this->StoreReturns->delete($storeReturn)) {
            $this->Flash->success(__('The store return has been deleted.'));
        } else {
            $this->Flash->error(__('The store return could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
