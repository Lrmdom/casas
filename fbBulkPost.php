
<?php

require_once 'fb/facebook.php';
// configuration
$facebookPermissions = 'photo_upload,user_status,publish_stream,user_photos,manage_pages';
$userSession = Yii::app()->session->sessionID;
$status = true;
$cookie = true;
$xfbml = true;
$oauth = true;
$appid = '790150834333514';
$appsecret = '20e682450ed4318abd3f390d1c4ed6a3';
$pageId = 'casasda.praia';
$msg = 'teste';
$title = 'casasdapraia.pt';
$uri = 'http://casasdapraia.pt';
$desc = 'Venha conhecer-nos. Registe-se ,crieumalerta e deixe o resto connosco';
$pic = 'http://casasdapraia.pt/css/images/casasdapraia2_small.png';
$action_name = 'Ir para casasdapraia.pt';
$action_link = 'http://www.casasdapraia.pt';

$facebook = new Facebook(array(
    'appId' => $appid,
    'secret' => $appsecret,
    'cookie' => false,
        ));

$user = $facebook->getUser();
// Contact Facebook and get token
if ($user) {
// you're logged in, and we'll get user acces token for posting on the wall

    try {
        $access_token = $facebook->getAccessToken();
        $friends = $facebook->api('/me/friends');
        if (!empty($access_token)) {
            $attachment = array(
                'access_token' => $access_token,
                'message' => $msg,
                'name' => $title,
                'link' => $uri,
                'description' => $desc,
                'picture' => $pic,
                'actions' => json_encode(array('name' => $action_name, 'link' => $action_link))
            );

//$status = $facebook->api("/" . $mutual->username . "/feed", "post", $attachment);
        }

        foreach ($friends['data'] as $friend) {
            $ids = $friend['id'];
            $mutual = json_decode(file_get_contents("http://graph.facebook.com/$ids"));


            if (!empty($access_token)) {
                $attachment = array(
                    'access_token' => $access_token,
                    'message' => $msg,
                    'name' => $title,
                    'link' => $uri,
                    'description' => $desc,
                    'picture' => $pic,
                    'actions' => json_encode(array('name' => $action_name, 'link' => $action_link))
                );
                echo($mutual->username);
                $status = $facebook->api("/" . $mutual->username . "/feed", "post", $attachment);
            } else {
                $status = 'No access token recieved';
            }
        }
        $status = $facebook->api("/" . $pageId . "/feed", "post", $attachment);
    } catch (FacebookApiException $e) {
        CVarDumper::dump($e);
        $user = null;
    }
} else {
    echo('user not found');
// you're not logged in, the application will try to log in to get a access token
    //header("Location:{$facebook->getLoginUrl(array('scope' => 'photo_upload,user_status,publish_stream,user_photos,manage_pages'))}");
}

echo $status;
