<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_Permission;
use Google_Service_Exception;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 * @property bool|object NewsImages
 * @property bool|object GoogleDrive
 * @property bool|object Files
 *
 * @method \App\Model\Entity\News[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NewsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('GoogleDrive'); // load specific component
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Files'],
            'order' => ['id' => 'DESC']
        ];
        $news = $this->paginate($this->News);
        $this->set(compact('news'));
    }

    public function home()
    {
        $this->viewBuilder()->setLayout('home');
        $this->paginate = [
            'contain' => ['Users','Files'],
            'condition' => ['News.feature =' => '1'],
            'limit' => 5,
            'order' => ['id' => 'DESC']
        ];
        $news = $this->paginate($this->News);
        $this->set(compact('news'));
    }
    public function carousel()
    {
        $this->viewBuilder()->setLayout('home');
        $this->paginate = [
            'contain' => ['Users','Files'],
            'condition' => ['News.feature =' => '1'],
            'limit' => 5,
            'order' => ['id' => 'DESC']
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
     * @throws \Exception
     */
    public function setup()
    {
        $client = $this->GoogleDrive->setup();
        var_dump($client);
        exit;
    }

    public function listDriveFiles()
    {
        $client = $this->GoogleDrive->client();
        $files_list = $this->GoogleDrive->listFiles($client);
        echo '<pre>';
        var_dump($files_list);
        exit;
    }

    public function add()
    {

        $client = $this->GoogleDrive->client();
        $news = $this->News->newEntity();
        if ($this->request->is(['post'])) {
            $info = $this->request->getData();
            $file = $info['image'];
            /**uploading the image to google Drive */
           // $client = $this->GoogleDrive->client();
            $file_id = $this->GoogleDrive->uploadImage($file, $client);
            //google drive service set permissions and file roles
            $this->GoogleDrive->setPermission($file_id, $client, 'anyone', 'reader');
            /***end of uploading functionality***/
            $news = $this->News->patchEntity($news, $this->request->getData());
            $news->user_id = 1;
            $news->active = 'yes';
            $news->banner_css = 'background-image: linear-gradient(to right, #FFFFFF 50% , #FFFFFF 50%);';

            if ($this->News->save($news)) {
                // print_r( $news->getErrors());
                $this->loadModel('Files');
                $image = $this->Files->newEntity();
                $dir = WWW_ROOT . 'files\\';
                if (move_uploaded_file($file['tmp_name'], $dir . $file['name'])) {
                    $this->request->data['filename'] = $file['name'];
                    $size = getimagesize($file['tmp_name'], $info);
                    $mime_type = mime_content_type($file['tmp_name']);
                    $newFile = $this->Files->patchEntity($image, $file);
                    $news_id = $news->id;
                    $newFile->news_id = $news_id;

                    $newFile->height = $size[0];
                    $newFile->width = $size[1];
                    // $newsImage->url = $dir . $file['name'];
                    $newFile->src = 'google';//{google,onedrive,local}
                    $newFile->path = $file_id;
                    $newFile->type = 'image';//file,image
                    $newFile->mime_type = $mime_type;
                    //$newFile->size = 'image';
                    /**link the  join tables with foreign keys to one another***/
                    $newFile->news = [$news];

                    if ($this->Files->save($newFile)) {
                        /**update the news banner id with the file id***/
                        $new = $this->News->get($news_id);
                        $new->banner_id = $newFile->id;
                        $this->News->save($new);
                        $this->Flash->success(__('The image file has been saved.'));
                    }
                  //  print_r($newFile->getErrors());
                }
                //exit;
                $this->Flash->success(__('The news has been saved.'));
                return $this->redirect(['controller' => 'news', 'action' => 'home']);
                //return $this->redirect(['action' => 'index']);
            }
            /* print_r( $news->getErrors());
              exit;*/
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
            $this->Flash->error(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function beforeFilter(Event $event)
    {
        $action = $this->request->getParam('action');
        if ($action === 'add') {
              Configure::write('debug', 0);

        }
        // return parent::beforeFilter($event); // TODO: Change the autogenerated stub
    }

}
