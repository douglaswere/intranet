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

class GoogleDriveComponent extends Component
{

    private $ApplicationName = 'Intranet';
    private $client;
    private $service;
    private $dir;

    // -----------------------------------------------------------------------------------
    // Constructor
    // -----------------------------------------------------------------------------------


    public function initialize(array $config)
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        // $this->getService();
        // set the credential array. All of these information can be found in the json file that was provied to you when you create
        // a service account
        $this->dir = ROOT . '\\';
        // create the new google client
        $this->client = new Google_Client();
        $this->client->setAuthConfig($this->dir . 'client_id.json');
        $this->client->setApplicationName('Intranet');
        $this->client->addScope(Google_Service_Drive::DRIVE);
        $this->client->setAccessType('offline');
        $this->client->setApprovalPrompt('force');
    }
    public function setup()
    {
        $this->client = new Google_Client();
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
        $this->client->setHttpClient($guzzleClient);
        $this->client->setAuthConfig($this->dir . 'client_id.json');
        $this->client->setApplicationName('Intranet');
        $this->client->addScope(Google_Service_Drive::DRIVE);
        $this->client->setAccessType('offline');
        $this->client->setApprovalPrompt('force');
        // create the service
        // $this->service = new Google_Service_Drive($this->client);

        if (file_exists($this->dir . "credentials.json")) {
            $access_token = (file_get_contents($this->dir . "credentials.json"));
            echo '<pre>';
            var_dump($access_token);
            $this->client->setAccessToken($access_token);
            //Refresh the token if it's expired.
            if ($this->client->isAccessTokenExpired()) {
                $refreshTokenSaved = $this->client->getRefreshToken();
                // $refreshTokenSaved = $client->getRefreshToken($access_token);
                // $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $this->client->fetchAccessTokenWithRefreshToken($refreshTokenSaved);
                // pass access token to some variable
                $accessTokenUpdated = $this->client->getAccessToken();
                $accessTokenUpdated['refresh_token'] = $refreshTokenSaved;
                //Set the new access token
                $accessToken = $refreshTokenSaved;
                $this->client->setAccessToken($accessToken);
                file_put_contents($this->dir . "credentials.json", json_encode($accessTokenUpdated));
                return $this->client;
                exit;

            } else {
                return $this->client;
                exit;
            }

        } else {
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }
    }
    public function client()
    {
        if (file_exists($this->dir . "credentials.json")) {
            $access_token = (file_get_contents($this->dir . "credentials.json"));
            $this->client->setAccessToken($access_token);
            //Refresh the token if it's expired.
            $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false,),));
            $this->client->setHttpClient($guzzleClient);
            if ($this->client->isAccessTokenExpired()) {
                $refreshTokenSaved = $this->client->getRefreshToken();
                // $refreshTokenSaved = $client->getRefreshToken($access_token);
                // $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
                $this->client->fetchAccessTokenWithRefreshToken($refreshTokenSaved);
                // pass access token to some variable
                $accessTokenUpdated = $this->client->getAccessToken();
                $accessTokenUpdated['refresh_token'] = $refreshTokenSaved;
                //Set the new access token
                $accessToken = $refreshTokenSaved;
                $this->client->setAccessToken($accessToken);
                file_put_contents($this->dir . "credentials.json", json_encode($accessTokenUpdated));
                return $this->client;
                exit;
            } else {
                return $this->client;
                exit;
            }
        } else {
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
            exit;
        }
    }


    // -----------------------------------------------------------------------------------
    // ShareWithUser
    // -----------------------------------------------------------------------------------
    public function addShared($fileId, $userEmail, $role)
    {
        // role can be reader, writer, etc
        $userPermission = new Google_Service_Drive_Permission(array(
            'type' => 'user',
            'role' => $role,
            'emailAddress' => $userEmail
        ));

        $request = $this->service->permissions->create(
            $fileId, $userPermission, array('fields' => 'id')
        );
    }


    // -----------------------------------------------------------------------------------
    // getInfo
    // -----------------------------------------------------------------------------------
    public function getInfo($fileId)
    {
        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data' => array()
        );
        $response = $this->service->files->get($fileId, array(
            'fields' => 'id, name, modifiedTime',
            'supportsTeamDrives' => true,
        ));
        if (empty($response)) {
            $retval['success'] = 0;
            return $retval;
        }

        $retval['success'] = 1;
        $retval['data'] = $response;
        return $retval;
    }


    // -----------------------------------------------------------------------------------
    // List Folders
    // -----------------------------------------------------------------------------------
    // this public function will search inside the parent dir only and wont recurse inside the subdir
    // the $parent is the id not the name

    public function listFolders($parent)
    {
        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data' => array()
        );
        if (empty($parent)) {
            $retval['success'] = 0;
            $retval['errorMessage'] = "parent is not specified";
            return $retval;
        }
        $pageToken = null;
        do {
            $response = $this->service->files->listFiles(array(
                'q' => "mimeType='application/vnd.google-apps.folder' and trashed=false and '" . $parent . "' in parents",
                'spaces' => 'drive',
                'pageToken' => $pageToken,
                'fields' => 'nextPageToken, files(id, name)',
                'supportsTeamDrives' => true,
                'includeTeamDriveItems' => true
            ));
            foreach ($response->files as $file) {
                $retval['data'][$file->id] = $file->name;
            }

            $pageToken = $response->nextPageToken;

        } while ($pageToken != null);
        $retval['success'] = 0;
        return $retval;
    }
    // -----------------------------------------------------------------------------------
    // creating a folder inside the $parent. The $name is the title of the folder
    // -----------------------------------------------------------------------------------
    public function createFolder($name, $parent)
    {

        if (empty($parent)) {
            return;
        }
        $fileMetadata = new Google_Service_Drive_DriveFile(array(
            'name' => "$name",
            'parents' => array($parent),
            'mimeType' => 'application/vnd.google-apps.folder'
        ));
        $file = $this->service->files->create($fileMetadata, array(
            'fields' => 'id',
            'supportsTeamDrives' => true
        ));
        return $file->id;
    }
    // -----------------------------------------------------------------------------------
    // check if a folder exist and return the Id of that folder
    // -----------------------------------------------------------------------------------
    public function isExistFolder($name, $parent)
    {
        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data' => array()
        );
        if (empty($parent)) {
            $retval['success'] = 0;
            $retval['errorMessage'] = 'parent is not specified';
            return $retval;
        }
        $pageToken = null;
        do {
            $response = $this->service->files->listFiles(array(
                'q' => "mimeType='application/vnd.google-apps.folder' and trashed=false and '" . $parent . "' in parents",
                'spaces' => 'drive',
                'pageToken' => $pageToken,
                'fields' => 'nextPageToken, files(id, name)',
                'supportsTeamDrives' => true,
                'includeTeamDriveItems' => true
            ));
            foreach ($response->files as $file) {
                if ($file->name === "$name") {
                    $retval['success'] = 1;
                    $retval['data']['id'] = $file->id;
                    return $retval;
                }
            }
            $pageToken = $response->nextPageToken;
        } while ($pageToken != null);
        // nothing was found, then return false
        $retval['success'] = 0;
        $retval['errorMessage'] = 'no entry was found';
        return $retval;
    }

    // -----------------------------------------------------------------------------------
    // public function that will return activities for a given $parent
    // -----------------------------------------------------------------------------------

    public function showActivities($clientId, $projectId)
    {

        $retval = array(
            'success' => 0,
            'errorMessage' => null,
            'data' => array()
        );


        if (!empty($clientId)) {
            $parent = $clientId;
        }

        if (!empty($projectId)) {
            $parent = $projectId;
        }

        $savedPageToken = '4513641';

        $response = $this->service->changes->getStartPageToken(array("supportsTeamDrives" => true));
        printf("Start token: %s\n", $response->startPageToken);
        return;

        # Begin with our last saved start token for this user or the
        # current token from getStartPageToken()
        $changed = array();
        $removed = array();

        $pageToken = $savedPageToken;
        while ($pageToken != null) {
            $response = $this->service->changes->listChanges($pageToken, array(
                'spaces' => 'drive',
                'supportsTeamDrives' => true,
                'includeTeamDriveItems' => true
            ));

            // print all of the files that got chagned
            foreach ($response->changes as $change) {
                // Process change
                if (!$change->removed) {
                    //echo "Time:[$change->time], Kind:[$change->kind], Type:[$change->type], Name:[".$change->file['name']."], Id:[$change->fileId]</br>";
                    $changed[$change->fileId] = "Time:[$change->time], Kind:[$change->kind], Type:[$change->type], Name:[" . $change->file['name'] . "]";
                }
            }
            // print all of the files that got removed
            foreach ($response->changes as $change) {
                // Process change
                if ($change->removed) {
                    //echo "Time:[$change->time], Kind:[$change->kind], Type:[$change->type], Name:[".$change->file['name']."], Id:[$change->fileId]</br>";
                    $removed[$change->fileId] = "Time:[$change->time], Kind:[$change->kind], Type:[$change->type]";
                }
            }

            if ($response->newStartPageToken != null) {
                // Last page, save this token for the next polling interval
                $savedStartPageToken = $response->newStartPageToken;
            }
            $pageToken = $response->nextPageToken;
        }

        echo "------------------------------------------ </br>";
        echo "All Removed Files </br>";
        echo "------------------------------------------ </br>";
        pr($removed);

        echo "</br>------------------------------------------ </br>";
        echo "All Changed Files </br>";
        echo "------------------------------------------ </br>";
        pr($changed);
    }


    // -----------------------------------------------------------------------------------
    // funcion used to move a file to a new parent
    // -----------------------------------------------------------------------------------

    public function move($fileId, $parent)
    {
        // move this file
        $emptyFileMetadata = new Google_Service_Drive_DriveFile();
        // Retrieve the existing parents to remove
        $fileInfo = $this->service->files->get($fileId, array('fields' => 'parents'));
        $previousParents = join(',', $fileInfo->parents);
        // Move the file to the new folder
        $fileInfo = $this->service->files->update($fileId, $emptyFileMetadata, array(
            'addParents' => $parent,
            'removeParents' => $previousParents,
            'fields' => 'id, parents',
            'supportsTeamDrives' => true,
        ));
    }

    // -----------------------------------------------------------------------------------
    // delete a folder or a file
    // -----------------------------------------------------------------------------------
    public function delete($fileId, $parent)
    {
        $this->service->files->delete($fileId, array('supportsTeamDrives' => true));
    }


}
