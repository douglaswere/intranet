<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 *
 * @method \App\Model\Entity\News[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $news = $this->paginate($this->News);
        $this->set(compact('news'));
    }

    public function home()
    {
        $this->viewBuilder()->setLayout('home');
        $this->paginate = [
            'contain' => ['Users']
        ];
        $news = $this->paginate($this->News);

        $this->set(compact('news'));
    }

    /**
     * View method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $news = $this->News->get($id, [
            'contain' => ['Users', 'Files', 'Tags']
        ]);

        $this->set('news', $news);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $news = $this->News->newEntity();
        $news->user_id = 1;

        if ($this->getRequest()->is('post')) {

            echo '<pre>';
            $info = $this->request->getData();

            $file = $info['image'];

            $this->loadModel('NewsImages');
            $image = $this->NewsImages->newEntity();
            if (move_uploaded_file($file['tmp_name'], WWW_ROOT . 'files' . $file['name'])) {
                $this->request->data['filename'] = $file['name'];
            }
            $newsImage = $this->NewsImages->patchEntity($image, $file);
            $newsImage->news_id = 1;
            var_dump($newsImage);
            exit;

            $news = $this->News->patchEntity($news, $this->request->getData());
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news could not be saved. Please, try again.'));
        }

        $users = $this->News->Users->find('list', ['limit' => 200]);
        $files = $this->News->Files->find('list', ['limit' => 200]);
        $tags = $this->News->Tags->find('list', ['limit' => 200]);
        $this->set(compact('news', 'users', 'files', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $news = $this->News->get($id, [
            'contain' => ['Files', 'Tags']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $news = $this->News->patchEntity($news, $this->request->getData());
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news could not be saved. Please, try again.'));
        }
        $users = $this->News->Users->find('list', ['limit' => 200]);
        $files = $this->News->Files->find('list', ['limit' => 200]);
        $tags = $this->News->Tags->find('list', ['limit' => 200]);
        $this->set(compact('news', 'users', 'files', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $news = $this->News->get($id);
        if ($this->News->delete($news)) {
            $this->Flash->success(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

}
