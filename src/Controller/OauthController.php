<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Cache\Cache;
use Google_Client;
use Google_Service_Drive;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @property  string $redirectUri
 * @method \App\Model\Entity\File[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class  OauthController extends AppController
{
    private $dir;
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->dir = ROOT .DS;
        //$this->redirectUri = '/intranet/oauth/callback';
        $this->redirectUri = '/oauth2callback.php';

    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function callback()
    {

        require_once  WWW_VENDOR.'autoload.php';
        $client = new Google_Client();
        /*$guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $client->setHttpClient($guzzleClient);*/
        $client->setAuthConfigFile( $this->dir.'client_id.json');
        $client->setApplicationName('Intranet');
        $client->addScope(Google_Service_Drive::DRIVE);
        $client->setAccessType('offline');
        $client->setApprovalPrompt('force');
        //  $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
        $client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . $this->redirectUri);
        $client->addScope(Google_Service_Drive::DRIVE); //::DRIVE_METADATA_READONLY

        $params = $this->request->getQueryParams('code');

         echo '<pre>';
         var_dump($client);
         var_dump($params);

        if (!isset($params['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authenticate($params['code']);
            //$_SESSION['access_token'] = $client->getAccessToken();
            $access_token = $client->getAccessToken();
            //$access_token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            Cache::write('credentials', json_encode($access_token));
            file_put_contents($this->dir.'credentials.json', json_encode($access_token));

            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $this->redirectUri;
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }
    }


}
