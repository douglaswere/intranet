<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NewsImages Controller
 *
 * @property \App\Model\Table\NewsImagesTable $NewsImages
 *
 * @method \App\Model\Entity\NewsImage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsImagesController extends AppController
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
        $newsImages = $this->paginate($this->NewsImages);

        $this->set(compact('newsImages'));
    }

    /**
     * View method
     *
     * @param string|null $id News Image id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsImage = $this->NewsImages->get($id, [
            'contain' => ['News']
        ]);

        $this->set('newsImage', $newsImage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsImage = $this->NewsImages->newEntity();
        if ($this->request->is('post')) {
            $newsImage = $this->NewsImages->patchEntity($newsImage, $this->request->getData());
            if ($this->NewsImages->save($newsImage)) {
                $this->Flash->success(__('The news image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news image could not be saved. Please, try again.'));
        }
        $news = $this->NewsImages->News->find('list', ['limit' => 200]);
        $this->set(compact('newsImage', 'news'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsImage = $this->NewsImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsImage = $this->NewsImages->patchEntity($newsImage, $this->request->getData());
            if ($this->NewsImages->save($newsImage)) {
                $this->Flash->success(__('The news image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news image could not be saved. Please, try again.'));
        }
        $news = $this->NewsImages->News->find('list', ['limit' => 200]);
        $this->set(compact('newsImage', 'news'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsImage = $this->NewsImages->get($id);
        if ($this->NewsImages->delete($newsImage)) {
            $this->Flash->success(__('The news image has been deleted.'));
        } else {
            $this->Flash->error(__('The news image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
