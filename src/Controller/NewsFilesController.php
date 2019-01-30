<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NewsFiles Controller
 *
 * @property \App\Model\Table\NewsFilesTable $NewsFiles
 *
 * @method \App\Model\Entity\NewsFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['News', 'Files']
        ];
        $newsFiles = $this->paginate($this->NewsFiles);

        $this->set(compact('newsFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id News File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsFile = $this->NewsFiles->get($id, [
            'contain' => ['News', 'Files']
        ]);

        $this->set('newsFile', $newsFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsFile = $this->NewsFiles->newEntity();
        if ($this->request->is('post')) {
            $newsFile = $this->NewsFiles->patchEntity($newsFile, $this->request->getData());
            if ($this->NewsFiles->save($newsFile)) {
                $this->Flash->success(__('The news file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news file could not be saved. Please, try again.'));
        }
        $news = $this->NewsFiles->News->find('list', ['limit' => 200]);
        $files = $this->NewsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('newsFile', 'news', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsFile = $this->NewsFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsFile = $this->NewsFiles->patchEntity($newsFile, $this->request->getData());
            if ($this->NewsFiles->save($newsFile)) {
                $this->Flash->success(__('The news file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news file could not be saved. Please, try again.'));
        }
        $news = $this->NewsFiles->News->find('list', ['limit' => 200]);
        $files = $this->NewsFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('newsFile', 'news', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsFile = $this->NewsFiles->get($id);
        if ($this->NewsFiles->delete($newsFile)) {
            $this->Flash->success(__('The news file has been deleted.'));
        } else {
            $this->Flash->error(__('The news file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
