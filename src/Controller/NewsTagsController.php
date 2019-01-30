<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NewsTags Controller
 *
 * @property \App\Model\Table\NewsTagsTable $NewsTags
 *
 * @method \App\Model\Entity\NewsTag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsTagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['News', 'Tags']
        ];
        $newsTags = $this->paginate($this->NewsTags);

        $this->set(compact('newsTags'));
    }

    /**
     * View method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $newsTag = $this->NewsTags->get($id, [
            'contain' => ['News', 'Tags']
        ]);

        $this->set('newsTag', $newsTag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $newsTag = $this->NewsTags->newEntity();
        if ($this->request->is('post')) {
            $newsTag = $this->NewsTags->patchEntity($newsTag, $this->request->getData());
            if ($this->NewsTags->save($newsTag)) {
                $this->Flash->success(__('The news tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news tag could not be saved. Please, try again.'));
        }
        $news = $this->NewsTags->News->find('list', ['limit' => 200]);
        $tags = $this->NewsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('newsTag', 'news', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $newsTag = $this->NewsTags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $newsTag = $this->NewsTags->patchEntity($newsTag, $this->request->getData());
            if ($this->NewsTags->save($newsTag)) {
                $this->Flash->success(__('The news tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The news tag could not be saved. Please, try again.'));
        }
        $news = $this->NewsTags->News->find('list', ['limit' => 200]);
        $tags = $this->NewsTags->Tags->find('list', ['limit' => 200]);
        $this->set(compact('newsTag', 'news', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id News Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $newsTag = $this->NewsTags->get($id);
        if ($this->NewsTags->delete($newsTag)) {
            $this->Flash->success(__('The news tag has been deleted.'));
        } else {
            $this->Flash->error(__('The news tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
