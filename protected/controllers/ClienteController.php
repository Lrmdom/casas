<?php

class ClienteController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $model;
    public $inic;
    public $fim;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('infoToClients', "myCompares", 'mylists', 'view', 'register', 'PwdRecover', 'captcha', 'confirmacaoGuest', 'activaProp', 'PwdRecoverConfirm'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'viewCreate', 'mybookings', 'myalerts', 'detailpartial'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'detail', 'create', 'switch'),
                'users' => array(Yii::app()->params['adminEmail']),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
            array('deny',
                'actions' => array('update', 'index', 'view', 'delete', 'mybookings', 'myalerts'),
                'expression' => '$_GET[\'id\'] !== Yii::app()->user->id ',
                'expression' => "( Yii::app()->user->name !==  Yii::app()->params['adminEmail'] ) || ( Yii::app()->user->isAdmin !==  'Back' )",
                'message' => "Não Autorizado!",
            ),
        );
    }

    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the register page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'testLimit' => -1,
            ),
        );
    }

    public function actionSwitch($id, $attribute) {

        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModelClient($id);
            $model->$attribute = ($model->$attribute == 0) ? 1 : 0;
            $model->save(false);

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionMylists() {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.rating.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
        if (Yii::app()->user->isGuest) {
            //die(Yii::app()->session->getSessionID());
            $favoritos = Mylist::model()->with('casa')->findAll(array('condition' => 't.sessid="' . Yii::app()->session->getSessionID() . '"'));
        } else {
            $favoritos = Mylist::model()->with('casa')->findAll(array('condition' => 'cliente=' . Yii::app()->user->id));
        }

        $this->render('//mylist/index', array('model' => new Mylist(), 'casas' => $favoritos->casa));
    }

    public function actionMyCompares() {
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.rating.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
        if (Yii::app()->user->isGuest) {
            //die(Yii::app()->session->getSessionID());
            $compares = Compare::model()->with('casa')->findAll(array('condition' => 't.sessid="' . Yii::app()->session->getSessionID() . '"'));
        } else {
            $compares = Compare::model()->with('casa')->findAll(array('condition' => 'cliente=' . Yii::app()->user->id));
        }
        $dataProvider = new CArrayDataProvider($compares, array(
//            'keyField' => 'cod_casa',
//            'sort' => array(
//                'attributes' => array(
//                    'cod_casa', 'tipo', 'pessoas', 'destino'
//                )),
            'pagination' => array(
                'pageSize' => 10,
            ),
        ));
        $this->render('//compare/index', array('model' => new Compare(), 'dataProvider' => $dataProvider));
    }

    public function actionMybookings($id) {
        $this->layout = '//layouts/search';

        $reservas = Reserva::model()->findAll(array('condition' => 'idcliente=' . Yii::app()->user->id));
        $this->render('//reserva/indexCliente', array('model' => new Reserva('searchCliente')));
    }

    public function actionMyalerts($id) {
        $this->layout = '//layouts/search';
        $alertas = Alert::model()->findAll(array('condition' => 'id_cliente=' . Yii::app()->user->id));
        $this->render('//alert/index', array('model' => new Alert('Search')));
    }

    public function actionInfoToClients() {
        $this->render('infoToClients');
    }

    public function actionView($id) {
        $this->layout = "search";
        $this->render('show', array(
            'cliente' => $this->loadModel($id),
            'inicio' => $this->inic,
            'fim' => $this->fim
        ));
    }

    public function actionViewCreate($id) {
        $this->render('detail', array(
            'model' => $this->loadModelClient($id),
        ));
    }

    public function actionDetail($id) {
        $this->render('detail', array(
            'model' => $this->loadModelClient($id),
        ));
    }

    public function actionDetailpartial($id) {
        $this->renderPartial('detail', array(
            'model' => $this->loadModelClient($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cliente;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            if ($model->save()) {
                $id = Yii::app()->db->lastInsertID;
                $mailer = Yii::createComponent('application.extensions.EMailer');
                $mailer->From = Yii::app()->params["noReplyEmail"];
                $mailer->AddAddress($model->email);
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->FromName = Yii::app()->name;
                $mailer->CharSet = 'UTF-8';
                $mailer->IsHTML(true);
                $mailer->getView('emailConfirmaRegisto', array('model' => $model), NULL);
                $mailer->Subject = Yii::t('demo', 'Confirme o seu registo!');
                $mailer->Send();
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->Send();
                $this->redirect(array('viewCreate', 'id' => $id));
            }
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->clienteid));
        }
        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cliente']))
            $model->attributes = $_GET['Cliente'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Cliente::model()->findByPk($id);
        if ($model->clienteid != $id)
            throw new CHttpException(404, 'Not alowed.');
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelClient($id) {
        $model = Cliente::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelClientPwd($id, $st) {
        $model = Cliente::model()->find('clienteid=' . $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionConfirmacao($id) {
        $this->render('confirmacao', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionConfirmacaoGuest($id) {
        $this->render('confirmacao', array(
            'model' => $this->loadModelClient($id),
        ));
    }

    public function actionRegister() {
        $this->layout = 'search';
        $model = new Cliente;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            if ($model->save()) {
                $id = Yii::app()->db->lastInsertID;
                //$message = 'Hello World!';
                $mailer = Yii::createComponent('application.extensions.EMailer');
                //$mailer->Host = 'smtp.casasdapraia.pt';
                //$mailer->IsSMTP();
                $mailer->From = Yii::app()->params["noReplyEmail"];
                //$mailer->AddReplyTo('l.r.m.d@sapo.pt');
                $mailer->AddAddress($model->email);
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->FromName = Yii::app()->name;
                $mailer->CharSet = 'UTF-8';
                $mailer->IsHTML(true);
                $mailer->getView('emailConfirmaRegisto', array('model' => $model), NULL);
                $mailer->Subject = Yii::t('demo', 'Confirmação de registo!');
//$mailer->Body = $mailer->getView('emailConfirmaRegisto',array('model'=>$model));
                $mailer->Send();
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->Send();
            }
            $this->redirect(array('confirmacaoguest', 'id' => $id));
        }
        $this->render('//cliente/_form', array(
            'model' => $model,
        ));
    }

    public function actionActivaprop($id, $sessid) {
        $model = Cliente::model()->find('clienteid=' . $id . " and sessid='" . $sessid . "'");
        $model->updateAll(array('activo' => 1,));
        $this->render('confirmacaoActivacao', array(
            'model' => $model,
        ));
    }

    public function actionPwdRecover() {

        if (isset($_POST['Cliente']['email'])) {
            $model = Cliente::model()->findByAttributes(array('email' => $_POST['Cliente']['email'], 'activo' => 1));
            if ($model != NULL) {
                $mailer = Yii::createComponent('application.extensions.EMailer');
                $mailer->From = Yii::app()->params["noReplyEmail"];
                $mailer->AddAddress($model->email);
                $mailer->FromName = Yii::app()->name;
                $mailer->CharSet = 'UTF-8';
                $mailer->IsHTML(true);
                $mailer->getView('emailPwdRecover', array('model' => $model), NULL);
                $mailer->Subject = 'A sua password';
                $mailer->Send();
                $this->redirect(array('pwdrecoverconfirm', 'id' => $model->clienteid, 'st' => $model->sessid));
            } else {
                Yii::app()->user->setFlash('error', $_POST['Cliente']['email'] . Yii::t("content", ', Não existe ou não está activo'), true);
                $this->refresh();
            }
        }
        $this->render('pwd');
    }

    public function actionPwdRecoverConfirm($id, $st) {
        $this->layout = 'search';
        $this->render('pwdRecoverConfirm', array(
            'model' => $this->loadModelClientPwd($id, $st),
        ));
    }

}
