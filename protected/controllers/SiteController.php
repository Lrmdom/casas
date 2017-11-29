<?php

class SiteController extends Controller {

    public $model;
    public $inic;
    public $fim;

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function createSlug($title) {
        // convert the raw title into an url friendly format here
        return $title;
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     *
     */
    public function actionIndex() {
        $this->layout = "";
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index', array(
            'inicio' => "",
            'fim' => "",
            'model' => new Casa()
        ));
    }

    public function actionMapa() {
        $this->layout = "";
        $this->render('mapa');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    public function actionCertif() {
        $this->render('certif');
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $this->layout = "";
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $headers = "From: {$model->emailSite}\r\nReply-To: {$model->email}";
                mail(Yii::app()->params['siteEmail'], $model->subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Obrigado pelo seu contato. Responderemos o mais brevemente possível.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {

        $_SESSION['login'] = 'client';
        $model = new LoginForm('Front');
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            //Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                if (Yii::app()->request->isAjaxRequest) {
                    Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                    echo CJSON::encode(array('status' => '700', 'redirect' => Yii::app()->user->returnUrl));
                    Yii::app()->end();
                } else {
                    $this->redirect($this->createUrl("site/index"));
                }
            }
        }
        if (Yii::app()->request->isAjaxRequest) {
            // display the login form
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.yiiactiveform.js'] = false;
            Yii::app()->clientScript->scriptMap['Chart.js'] = false;
            $this->renderPartial('login', array('model' => $model, 'col' => 'col-md-6', 'offset' => 'col-md-offset-3'), false, true);
        } else {
            $this->render('login', array('model' => $model, 'col' => 'col-md-6', 'offset' => 'col-md-offset-3'));
        }
    }

    public function actionLoginOwner() {

        $_SESSION['login'] = 'owner';
        $model = new LoginForm('Back');
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {

                if (Yii::app()->request->isAjaxRequest) {
                    Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                    echo CJSON::encode(array('status' => '700', 'redirect' => Yii::app()->user->returnUrl));
                    Yii::app()->end();
                } else {
                    $this->redirect($this->createUrl("proprietario/view", array('id' => Yii::app()->user->id)));
                }
            }
        }
        // display the login form
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.yiiactiveform.js'] = false;
            Yii::app()->clientScript->scriptMap['Chart.js'] = false;

            $this->renderPartial('login', array('model' => $model, 'back' => 1, 'col' => 'col-md-6', 'offset' => 'col-md-offset-3'), false, true);
        } else {
            $this->render('login', array('model' => $model, 'col' => 'col-md-6', 'offset' => 'col-md-offset-3'));
        }
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionPesquisas() {
        $this->render('pesquisas', array('model' => $model));
    }

}
