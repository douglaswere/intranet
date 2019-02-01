<?php
/**
 * Created by PhpStorm.
 * User: dwere
 * Date: 1/31/2019
 * Time: 4:36 PM
 */

namespace App\Controller\Component;

use Cake\Controller\Component;
use Google_Client;
use Google_Service_Drive;

class GoogleComponent extends Component
{

    public function getService()
    {
        require_once ROOT . '/vendor/autoload.php';
        $dir = WWW_ROOT . '\\';
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $dir . 'credentials.json');
        $client = new Google_Client();
        $client->setApplicationName('Intranet');
        $client->setClientId('596939720488-i4akog36fmqnmc6a6p5vcmroc6uhq907.apps.googleusercontent.com');
        $client->setClientSecret('WekTC18QravDTTge1LR7ZGoc');
        $client->setRedirectUri('http://localhost/intranet/news/add');
        //AUTH.PHP should have code to authenticate code and return back another code.
        $client->setScopes(array('https://www.googleapis.com/auth/drive'));
        // $service = new Google_Service_Drive($client);

        //**********************authentication process for web

        $authUrl = $client->createAuthUrl();
        print "<a href='$authUrl'>Connect Me!</a>";

        if (isset($_GET['code'])) {
            $accessToken = $client->authenticate($_GET['code']);
            file_put_contents($dir . 'conf.json', $accessToken);
            $client->setAccessToken($accessToken);
            $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
        }

        $client->setAccessToken(file_get_contents($dir . 'conf.json'));

        $client->getAccessToken();
        $service = new Google_Service_Drive($client);
        if ($client->getAccessToken()) {

            return $service;
        }
    }


}
