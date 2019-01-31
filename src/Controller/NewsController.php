<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Google_Client;
use Google_Service_Drive;

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
            'contain' => ['Users', 'NewsImages'],
            'condition' => ['feature !=' => 1],
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


            $client = $this->getClient();
            $service = new Google_Service_Drive($client);

// Print the names and IDs for up to 10 files.
            $optParams = array(
                'pageSize' => 10,
                'fields' => 'nextPageToken, files(id, name)'
            );
            $results = $service->files->listFiles($optParams);

            if (count($results->getFiles()) == 0) {
                print "No files found.\n";
            } else {
                print "Files:\n";
                foreach ($results->getFiles() as $file) {
                    printf("%s (%s)\n", $file->getName(), $file->getId());
                }
            }
            exit;

            $news = $this->News->patchEntity($news, $this->request->getData());
            if ($this->News->save($news)) {

                $this->loadModel('NewsImages');
                $image = $this->NewsImages->newEntity();

                $dir = WWW_ROOT . 'files\\';
                if (move_uploaded_file($file['tmp_name'], $dir . $file['name'])) {

                    $this->request->data['filename'] = $file['name'];
                    $size = getimagesize($file['tmp_name'], $info);
                    $newsImage = $this->NewsImages->patchEntity($image, $file);
                    $newsImage->news_id = $news->id;
                    $newsImage->height = $size[0];
                    $newsImage->width = $size[1];
                    $newsImage->feature = $news->feature;
                    $newsImage->url = $dir . $file['name'];
                    if ($this->NewsImages->save($newsImage)) {
                        $this->Flash->success(__('The image file has been saved.'));
                    }
                }
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

    public function getClient()
    {
        //4/4wDoQ6vdxg0_DfSkbmJkIXtum2TtnMA8FwChp4utN1lQk8TUKO2TD4c
        //4/4wCB-LR3BjHILCPEbnjJp7U7xn5i8ipkgH5f7T1mZbOlYR-rpp_bAVI
        $client = new Google_Client();
        $client->setApplicationName('Intranet');
        $client->setScopes(Google_Service_Drive::DRIVE_METADATA_READONLY);
        $dir = WWW_ROOT . '\\';
        $client->setAuthConfig($dir.'credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.

        $tokenPath =  $dir.'token.json';
        if (file_exists($tokenPath)) {
            $accessToken = json_decode(file_get_contents($tokenPath), true);
            $client->setAccessToken($accessToken);
        }

        // If there is no previous token or it's expired.
        if ($client->isAccessTokenExpired()) {
            // Refresh the token if possible, else fetch a new one.
            if ($client->getRefreshToken()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
            } else {
                // Request authorization from the user.
                $authUrl = $client->createAuthUrl();
                printf("Open the following link in your browser:\n%s\n", $authUrl);
                print 'Enter verification code: ';
                $authCode = trim(fgets(STDIN));

                // Exchange authorization code for an access token.
                $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);
                $client->setAccessToken($accessToken);

                // Check to see if there was an error.
                if (array_key_exists('error', $accessToken)) {
                    throw new Exception(join(', ', $accessToken));
                }
            }
            // Save the token to a file.
            if (!file_exists(dirname($tokenPath))) {
                if (!mkdir($concurrentDirectory = dirname($tokenPath), 0700, true) && !is_dir($concurrentDirectory)) {
                    throw new \RuntimeException(sprintf('Directory "%s" was not created', $concurrentDirectory));
                }
            }
            file_put_contents($tokenPath, json_encode($client->getAccessToken()));
        }
        return $client;
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
