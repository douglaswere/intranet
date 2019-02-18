<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Newsimages Controller
 *
 * @property \App\Model\Table\NewsimagesTable $Newsimages
 *
 * @method \App\Model\Entity\Newsimage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsimagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['News']
        ];
        $newsimages = $this->paginate($this->NewsImages);

        $this->set(compact('newsimages'));
    }

    /**
     * View method
     *
     * @param string|null $id Newsimage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsimage = $this->NewsImages->get($id, [
            'contain' => ['News']
        ]);

        $this->set('newsimage', $newsimage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsimage = $this->NewsImages->newEntity();
        if ($this->request->is('post')) {
            $newsimage = $this->NewsImages->patchEntity($newsimage, $this->request->getData());
            if ($this->Newsimages->save($newsimage)) {
                $this->Flash->success(__('The newsimage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The newsimage could not be saved. Please, try again.'));
        }
        $news = $this->NewsImages->News->find('list', ['limit' => 200]);
        $this->set(compact('newsimage', 'news'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Newsimage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsimage = $this->NewsImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsimage = $this->NewsImages->patchEntity($newsimage, $this->request->getData());
            if ($this->NewsImages->save($newsimage)) {
                $this->Flash->success(__('The newsimage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The newsimage could not be saved. Please, try again.'));
        }
        $news = $this->NewsImages->News->find('list', ['limit' => 200]);
        $this->set(compact('newsimage', 'news'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Newsimage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsimage = $this->NewsImages->get($id);
        if ($this->NewsImages->delete($newsimage)) {
            $this->Flash->success(__('The newsimage has been deleted.'));
        } else {
            $this->Flash->error(__('The newsimage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
