<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_Permission;
use Google_Service_Exception;

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
            'contain' => ['Users', 'NewsImages'],
            'order' => ['id' => 'DESC']
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

    public function googleAuth()
    {
        // $this->loadComponent('Google');

        $dir = ROOT . '\\';
        $client = new Google_Client();
        $client->setAuthConfig($dir . 'client_id.json');
        $client->setApplicationName('Intranet');
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        if (file_exists($dir . "credentials.json")) {

            $access_token = (file_get_contents($dir . "credentials.json"));
            $client->setAccessToken($access_token);
            //Refresh the token if it's expired.
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                file_put_contents($dir . "credentials.json", json_encode($client->getAccessToken()));
                return $this->redirect(['controller' => 'news', 'action' => 'add']);
            }
            /* $drive_service = new Google_Service_Drive($client);
            $files_list = $drive_service->files->listFiles(array())->getFiles();

                       echo '<pre>';
                        var_dump($files_list);
             echo json_encode($files_list);
            */
            return $this->redirect(['controller' => 'news', 'action' => 'add']);

        } else {

            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            // return $this->redirect(['controller' => 'Oauth', 'action' => 'callback']);
            exit;
        }
        return $this->redirect(['controller' => 'news', 'action' => 'add']);
        exit;

    }

    public function google()
    {
        $client = new Google_Client();
        $dir = ROOT . '\\';
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $client->setHttpClient($guzzleClient);
        $client->setAuthConfig($dir . 'client_id.json');
        $client->setApplicationName('Intranet');
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        if (file_exists($dir . "credentials.json")) {
            $access_token = (file_get_contents($dir . "credentials.json"));
            echo '<pre>';
            var_dump($access_token);
            $client->setAccessToken($access_token);
            //Refresh the token if it's expired.
            if ($client->isAccessTokenExpired()) {
                $refreshTokenSaved = $client->getRefreshToken();
               // $refreshTokenSaved = $client->getRefreshToken($access_token);
               // $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $client->fetchAccessTokenWithRefreshToken($refreshTokenSaved);
                // pass access token to some variable
                $accessTokenUpdated = $client->getAccessToken();

                $accessTokenUpdated['refresh_token'] = $refreshTokenSaved;

                //Set the new access token
                $accessToken = $refreshTokenSaved;
                $client->setAccessToken($accessToken);
                file_put_contents($dir . "credentials.json", json_encode($accessTokenUpdated));
                return $this->redirect(['controller' => 'news', 'action' => 'add']);
                exit;

               /* $accessTokenUpdated = $client->getAccessToken();

                // append refresh token
                $accessTokenUpdated['refresh_token'] = $refreshTokenSaved;

                //Set the new acces token
                $accessToken = $refreshTokenSaved;
                $client->setAccessToken($accessToken);

                file_put_contents($dir . "credentials.json", json_encode($client->getAccessToken()));
 */           } else {
                return $this->redirect(['controller' => 'news', 'action' => 'add']);
                exit;
            }

        } else {
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }

    }

    public function add()
    {

        $news = $this->News->newEntity();
        $dir = ROOT . '\\';

        if ($this->request->is(['post'])) {

            if (!file_exists($dir . "credentials.json")) {

                return $this->redirect(['action' => 'google']);
            }
            $info = $this->request->getData();
            $file = $info['image'];
            // $this->loadComponent('Google');
            $client = new Google_Client();
            $access_token = (file_get_contents($dir . "credentials.json"));

            $client->setAccessToken($access_token);
            $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
            $client->setHttpClient($guzzleClient);
            //Refresh the token if it's expired.
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                file_put_contents($dir . 'credentials.json', json_encode($client->getAccessToken()));
            }
            $drive_service = new Google_Service_Drive($client);
            $file_drive = new \Google_Service_Drive_DriveFile();
            $file_drive->setName($file['name']);
            $file_drive->setDescription('A test document');
            $file_drive->setMimeType('image/jpeg');
            $data = file_get_contents($file['tmp_name']);
            // $folderId = '0AIiZFlCqNHniUk9PVA';
            $createdFile = $drive_service->files->create($file_drive, array(
                'data' => $data,
                'mimeType' => 'image/jpeg',
                // 'parents' => array($folderId)
            ));

            $google_id = $createdFile->id;

            $fileId = $createdFile->id;

            $newPermission = new Google_Service_Drive_Permission();
            $newPermission->setType('anyone');
            $newPermission->setRole('reader');

            try
            {
                $drive_service->permissions->create($fileId, $newPermission);
            }
            catch (Exception $e)
            {
                print "An error occurred: " . $e->getMessage();
            }


            $news = $this->News->patchEntity($news, $this->request->getData());
            $news->user_id = 1;
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
                    $newsImage->style = 'background-image: linear-gradient(to right, #FFFFFF 50% , #FFFFFF 50%);';
                    // $newsImage->url = $dir . $file['name'];
                    $newsImage->url = $google_id;
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
        $client->setAuthConfig($dir . 'credentials.json');
        $client->setAccessType('offline');
        $client->setPrompt('select_account consent');

        // Load previously authorized token from a file, if it exists.
        // The file token.json stores the user's access and refresh tokens, and is
        // created automatically when the authorization flow completes for the first
        // time.

        $tokenPath = $dir . 'token.json';
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
