<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blobs Controller
 *
 * @property \App\Model\Table\BlobsTable $Blobs
 *
 * @method \App\Model\Entity\Blob[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlobsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $blobs = $this->paginate($this->Blobs);

        $this->set(compact('blobs'));
    }

    /**
     * View method
     *
     * @param string|null $id Blob id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blob = $this->Blobs->get($id, [
            'contain' => ['Files']
        ]);

        $this->set('blob', $blob);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blob = $this->Blobs->newEntity();
        if ($this->request->is('post')) {
            $blob = $this->Blobs->patchEntity($blob, $this->request->getData());
            if ($this->Blobs->save($blob)) {
                $this->Flash->success(__('The blob has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blob could not be saved. Please, try again.'));
        }
        $this->set(compact('blob'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Blob id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blob = $this->Blobs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blob = $this->Blobs->patchEntity($blob, $this->request->getData());
            if ($this->Blobs->save($blob)) {
                $this->Flash->success(__('The blob has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The blob could not be saved. Please, try again.'));
        }
        $this->set(compact('blob'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Blob id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blob = $this->Blobs->get($id);
        if ($this->Blobs->delete($blob)) {
            $this->Flash->success(__('The blob has been deleted.'));
        } else {
            $this->Flash->error(__('The blob could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
