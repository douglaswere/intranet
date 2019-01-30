<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StoreSortfield Controller
 *
 * @property \App\Model\Table\StoreSortfieldTable $StoreSortfield
 *
 * @method \App\Model\Entity\StoreSortfield[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class StoreSortfieldController extends AppController
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
        $storeSortfield = $this->paginate($this->StoreSortfield);

        $this->set(compact('storeSortfield'));
    }

    /**
     * View method
     *
     * @param string|null $id Store Sortfield id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $storeSortfield = $this->StoreSortfield->get($id, [
            'contain' => ['Stores']
        ]);

        $this->set('storeSortfield', $storeSortfield);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $storeSortfield = $this->StoreSortfield->newEntity();
        if ($this->request->is('post')) {
            $storeSortfield = $this->StoreSortfield->patchEntity($storeSortfield, $this->request->getData());
            if ($this->StoreSortfield->save($storeSortfield)) {
                $this->Flash->success(__('The store sortfield has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store sortfield could not be saved. Please, try again.'));
        }
        $stores = $this->StoreSortfield->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeSortfield', 'stores'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Store Sortfield id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $storeSortfield = $this->StoreSortfield->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $storeSortfield = $this->StoreSortfield->patchEntity($storeSortfield, $this->request->getData());
            if ($this->StoreSortfield->save($storeSortfield)) {
                $this->Flash->success(__('The store sortfield has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The store sortfield could not be saved. Please, try again.'));
        }
        $stores = $this->StoreSortfield->Stores->find('list', ['limit' => 200]);
        $this->set(compact('storeSortfield', 'stores'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Store Sortfield id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $storeSortfield = $this->StoreSortfield->get($id);
        if ($this->StoreSortfield->delete($storeSortfield)) {
            $this->Flash->success(__('The store sortfield has been deleted.'));
        } else {
            $this->Flash->error(__('The store sortfield could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
