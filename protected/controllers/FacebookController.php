<?php

/**
 * class FacebookController
 * @author Igor Ivanović
 * Used to controll facebook login system
 */
class FacebookController extends Controller {

    /**
     * This method authenticate logged in facebook user
     * @param type $id string(int)
     * @param type $name string
     * @param type $surname string
     * @param type $username string
     * @param type $email string
     * @param type $session string
     */
    public function actionLogin($id = null, $name = null, $surname = null, $username = null, $email = null, $session = null) {

        if (!Yii::app()->request->isAjaxRequest) {
            echo json_encode(array('error' => 'this is not ajax request'));
            die();
        } else {
            if (empty($email)) {
                echo json_encode(array('error' => 'email is not provided'));
                die();
            }
            if ($session == Yii::app()->session->sessionID) {
                //$this->_identity->userType='Front';
                $user = Cliente::prepareUserForAuthorisation($email);
                if ($user === null) {
                    $user = new Cliente('fb');
                    $user->email = $email;
                    $user->cliente = $name . " " . $surname;
                    ;
                    $user->senha = $email;
                    $user->senha_repeat = $user->createRandomUsername();
                    $user->telefone = $name;
                    $user->morada = $name;
                    $user->cod_postal = $name;
                    $user->localidade = $name;
                    $user->pais = $name;
                    $user->activo = 1;
                    $user->subscribe_newsletter = 1;
                    $user->facebook_account = 1;
                    $user->fb_id = $id;
                    $user->insert();
                } else {
                    $user = Cliente::model()->find('email = "' . $email . '"');

                    $user->email = $email;
                    $user->cliente = $name . " " . $surname;

                    $user->senha = $email;
                    $user->senha_repeat = $user->createRandomUsername();
                    $user->telefone = $name;
                    $user->morada = $name;
                    $user->cod_postal = $name;
                    $user->localidade = $name;
                    $user->pais = $name;
                    $user->activo = 1;
                    $user->subscribe_newsletter = 1;
                    $user->facebook_account = 1;
                    $user->fb_id = $id;
                    $user->update();
                }

                $identity = new UserIdentity($user->email, $user->senha);
                $identity->facebookAuthenticate();
                if ($identity->errorCode === UserIdentity::ERROR_NONE) {


                    Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                    Yii::app()->user->login($identity, NULL);
                    Yii::app()->user->setFlash('success', Yii::app()->user->name, true);
                    echo json_encode(array('error' => 0, 'redirect' => Yii::app()->user->returnUrl));
                } else {
                    echo json_encode(array('error' => 'user not logged in'));
                    die();
                }
            } else {
                echo json_encode(array('error' => 'session id is not the same'));
                die();
            }
        }
    }

    public
            function actionLoginOwner($id = null, $name = null, $surname = null, $username = null, $email = null, $session = null) {

        if (!Yii::app()->request->isAjaxRequest) {
            echo json_encode(array('error' => 'this is not ajax request'));
            die();
        } else {
            if (empty($email)) {
                echo json_encode(array('error' => 'email is not provided'));
                die();
            }
            if ($session == Yii::app()->session->sessionID) {
                //$this->_identity->userType='Front';
                $user = Proprietario::prepareUserForAuthorisation($email);
                if ($user === null) {
                    $user = new proprietario();
                    $user->email = $email;
                    $user->proprietario = $name;
                    $user->senha = $email;
                    $user->senha_repeat = $user->createRandomUsername();
                    $user->telefone = $name;
                    $user->morada = $name;
                    $user->cod_postal = $name;
                    $user->localidade = $name;
                    $user->pais = $name;
                    $user->activo = 1;
                    $user->subscribe_newsletter = 1;
                    $user->facebook_account = 1;
                    $user->fb_id = $id;

                    $user->insert();
                } else {
                    $user = Proprietario::model()->find('email = "' . $email . '"');
                    $user->email = $email;
                    $user->proprietario = $name . " " . $surname;

                    $user->senha = $email;
                    $user->senha_repeat = $user->createRandomUsername();
                    $user->telefone = $name;
                    $user->morada = $name;
                    $user->cod_postal = $name;
                    $user->localidade = $name;
                    $user->pais = $name;
                    $user->activo = 1;
                    $user->subscribe_newsletter = 1;
                    $user->facebook_account = 1;
                    $user->fb_id = $id;
                    $user->update();
                }
                $identity = new UserIdentity($user->email, $user->senha);
                $identity->facebookAuthenticateOwner();
                if ($identity->errorCode === UserIdentity::ERROR_NONE) {
                    Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                    Yii::app()->user->login($identity, NULL);
                    Yii::app()->user->setFlash('success', Yii::app()->user->name, true);
                    echo json_encode(array('error' => 0, 'redirect' => $this->createUrl('proprietario/view/' . Yii::app()->user->id)));
                } else {
                    echo json_encode(array('error' => 'user not logged in owner'));
                    die();
                }
            } else {
                echo json_encode(array('error' => 'session id is not the same'));
                die();
            }
        }
    }

}
