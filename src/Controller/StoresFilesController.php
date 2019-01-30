<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoresFiles Controller
 *
 * @property \App\Model\Table\StoresFilesTable $StoresFiles
 *
 * @method \App\Model\Entity\StoresFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoresFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Stores', 'Files']
        ];
        $storesFiles = $this->paginate($this->StoresFiles);

        $this->set(compact('storesFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Stores File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storesFile = $this->StoresFiles->get($id, [
            'contain' => ['Stores', 'Files']
        ]);

        $this->set('storesFile', $storesFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storesFile = $this->StoresFiles->newEntity();
        if ($this->request->is('post')) {
            $storesFile = $this->StoresFiles->patchEntity($storesFile, $this->request->getData());
            if ($this->StoresFiles->save($storesFile)) {
                $this->Flash->success(__('The stores file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores file could not be saved. Please, try again.'));
        }
        $stores = $this->StoresFiles->Stores->find('list', ['limit' => 200]);
        $files = $this->StoresFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('storesFile', 'stores', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stores File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storesFile = $this->StoresFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesFile = $this->StoresFiles->patchEntity($storesFile, $this->request->getData());
            if ($this->StoresFiles->save($storesFile)) {
                $this->Flash->success(__('The stores file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores file could not be saved. Please, try again.'));
        }
        $stores = $this->StoresFiles->Stores->find('list', ['limit' => 200]);
        $files = $this->StoresFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('storesFile', 'stores', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stores File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storesFile = $this->StoresFiles->get($id);
        if ($this->StoresFiles->delete($storesFile)) {
            $this->Flash->success(__('The stores file has been deleted.'));
        } else {
            $this->Flash->error(__('The stores file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
