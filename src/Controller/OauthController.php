<?php

namespace App\Controller;

use App\Controller\AppController;
use Google_Client;
use Google_Service_Drive;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class  OauthController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function callback()
    {
        $dir = ROOT . '\\';
        require_once ROOT.'/vendor'.DS.'autoload.php';
        $client = new Google_Client();

        $client->setAuthConfigFile($dir . 'client_id.json');
        $client->setApplicationName('Intranet');
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/intranet/oauth/callback');
        $client->addScope(Google_Service_Drive::DRIVE); //::DRIVE_METADATA_READONLY

        $params = $this->request->getQueryParams('code');
        echo '<pre>';
        var_dump($client);
        var_dump($params);
        exit;

        if (!isset($params['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $params = $this->request->getQueryParams('code');
            echo $params['code'];
            $client->authenticate($params['code']);
            //$_SESSION['access_token'] = $client->getAccessToken();
            $access_token = $client->getAccessToken();
            //$access_token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            file_put_contents($dir . 'credentials.json', json_encode($access_token));

            /*   $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . 'intranet/news/add';
               header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));*/

            $this->redirect(['controller' => 'news', 'action' => 'add']);
        }


    }

}
