<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FbPost
 *
 * @author led
 */
class FbPost {

    public function post($id, $ctl) {
        require_once 'fb/facebook.php';
// configuration
        $appid = Yii::app()->params["fbAppId"];
        $appsecret = Yii::app()->params["fbAppSecret"];
        $pageId = Yii::app()->params["fbAppPublishPage"];
        $domain = Yii::app()->request->getServerName();
        $casa = new Casa();
        $cs = $casa->findByPk($id);
        $msg = "Mais um imóvel disponível em http://$domain/casa/client/$id, $cs->tipo em $cs->localidade \n";
        if ($cs->for_sale == 1)
            $msg = $msg . '       Venda: Eur ' . $cs->valor_venda . "\n";
        if ($cs->for_arrenda == 1)
            $msg = $msg . '       Arrendamento: Eur ' . $cs->valor_arrendamento . "\n";
        if ($cs->for_rent == 1)
            $msg = $msg . '       Disponível aluguer para férias';
        $title = 'casasdapraia.pt';
        $uri = "http://$domain/index.php/casa/client/$id";
        $desc = 'Gerado automáticamente.';
        $pic = "http://$domain/uploads/$cs->img_1";
        $action_name = 'Ir para casasdapraia.pt';
        $action_link = "http://$domain";
        if ($ctl == 'feedback') {
            $casa = new Feedback();
            $cs = $casa->findByPk($id);
            $msg = 'Foi atribuido feedback ao imóvel ' . "\n" . $cs->cod_casa;
            $cs->comment;
            $uri = "http://$domain/index.php/casa/client/$cs->cod_casa";
            $desc = '  Este post foi gerado automáticamente.';
            $pic = "http://$domain/" . Yii::app()->params["watermarkImg"];
        }
        $facebook = new Facebook(array(
            'appId' => $appid,
            'secret' => $appsecret,
            'cookie' => false,
        ));
        //$user = $facebook->getUser();
        $user = $facebook->getUser();
// Contact Facebook and get token
        if ($user) {

            // you're logged in, and we'll get user acces token for posting on the wall
            try {
                $access_token = $facebook->getAccessToken();
// $page_info = $facebook->api("/$pageId?fields=access_token");

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
                    // $friends = $facebook->api('/me/friends');
                    $status = $facebook->api("/" . $pageId . "/feed", "post", $attachment);
                    Yii::app()->user->setFlash('success', Yii::t("content", "Casa anunciada no facebook"), true);
                } else {
                    $status = 'No access token recieved';
                    Yii::app()->user->setFlash('error', Yii::t("content", 'Erro. Casa não foi adicionada ao facebook'), true);
                }
            } catch (FacebookApiException $e) {
                error_log($e);
                //die($e);
                $user = null;
            }
        } else {

            // you're not logged in, the application will try to log in to get a access token
            header("Location:{$facebook->getLoginUrl(array('scope' => 'photo_upload,user_status,publish_stream,user_photos,manage_pages'))}");
        }
        // echo $status;
    }

    //put your code here
}

?>
