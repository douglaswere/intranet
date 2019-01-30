<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoreIpmaps Controller
 *
 * @property \App\Model\Table\StoreIpmapsTable $StoreIpmaps
 *
 * @method \App\Model\Entity\StoreIpmap[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreIpmapsController extends AppController
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
        $storeIpmaps = $this->paginate($this->StoreIpmaps);

        $this->set(compact('storeIpmaps'));
    }

    /**
     * View method
     *
     * @param string|null $id Store Ipmap id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeIpmap = $this->StoreIpmaps->get($id, [
            'contain' => ['Stores']
        ]);

        $this->set('storeIpmap', $storeIpmap);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storeIpmap = $this->StoreIpmaps->newEntity();
        if ($this->request->is('post')) {
            $storeIpmap = $this->StoreIpmaps->patchEntity($storeIpmap, $this->request->getData());
            if ($this->StoreIpmaps->save($storeIpmap)) {
                $this->Flash->success(__('The store ipmap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store ipmap could not be saved. Please, try again.'));
        }
        $stores = $this->StoreIpmaps->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeIpmap', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Ipmap id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeIpmap = $this->StoreIpmaps->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storeIpmap = $this->StoreIpmaps->patchEntity($storeIpmap, $this->request->getData());
            if ($this->StoreIpmaps->save($storeIpmap)) {
                $this->Flash->success(__('The store ipmap has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store ipmap could not be saved. Please, try again.'));
        }
        $stores = $this->StoreIpmaps->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeIpmap', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Ipmap id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeIpmap = $this->StoreIpmaps->get($id);
        if ($this->StoreIpmaps->delete($storeIpmap)) {
            $this->Flash->success(__('The store ipmap has been deleted.'));
        } else {
            $this->Flash->error(__('The store ipmap could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
