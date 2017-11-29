<?php

class ProprietarioController extends Controller {

    private $_identity;

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            array('deny', // deny all users
                'actions' => array('register', 'confirmacaoGuest'),
                'users' => array('@'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                // need to allow captcha in order to view it.
                'actions' => array('infoToOwners', 'confirmacao', 'captcha', 'register', 'confirmacaoGuest', 'activaprop', 'PwdRecover', 'PwdRecoverConfirm'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('update', 'view', 'switch', 'detailpartial'),
                'users' => array('@'),
                'expression' => "( Yii::app()->user->name ==  Yii::app()->params['adminEmail'] ) || ( Yii::app()->user->isAdmin ==  'Back' )",
            ),
            array('allow',
                'actions' => array('admin', 'delete', 'index', 'create', 'view', 'update'),
                'users' => array(Yii::app()->params['adminEmail']),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
            array('deny',
                'actions' => array('update', 'index', 'view', 'create', 'delete'),
                'expression' => '$_GET[\'id\'] !== Yii::app()->user->id ',
                'expression' => "( Yii::app()->user->name !==  Yii::app()->params['adminEmail'] ) || ( Yii::app()->user->isAdmin !==  'Back' )",
                'message' => "Não Autorizado!",
            ),
        );
    }

    public function actionSwitch($id, $attribute) {

        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            $model->$attribute = ($model->$attribute == 0) ? 1 : 0;
            $model->save(false);

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionInfoToOwners() {
        $this->layout = 'column1';
        $this->render('infoToOwners');
    }

    public function actionActivaprop($id, $sessid) {
        $model = Proprietario::model()->find('propid=' . $id . " and sessid='" . $sessid . "'");
        $model->updateAll(array('activo' => 1,));
        $this->render('confirmacaoActivacao', array(
            'model' => $model,
        ));
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

    public function loadModelClient($id) {
        $model = Proprietario::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionDetailpartial($id) {
        $this->renderPartial('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Proprietario;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Proprietario'])) {
            $model->attributes = $_POST['Proprietario'];
            //  Proprietario::model()->beforeSave();
            if ($model->save())
                $id = Yii::app()->db->lastInsertID;
            $mailer = Yii::createComponent('application.extensions.EMailer');
            $mailer->From = Yii::app()->params["noReplyEmail"];
            $mailer->AddAddress($model->email);
            $mailer->AddAddress(Yii::app()->params['adminEmail']);
            $mailer->FromName = Yii::app()->name;
            $mailer->CharSet = 'UTF-8';
            $mailer->IsHTML(true);
            $mailer->getView('emailConfirmaRegisto', array('model' => $model), NULL);
            $mailer->Subject = Yii::t('demo', 'Confirme o seu registo.');
            $mailer->Send();
            $mailer->AddAddress(Yii::app()->params['adminEmail']);
            $mailer->Send();
            $this->redirect(array('confirmacao', 'id' => $model->propid));
        }
        $this->render('_form', array(
            'model' => $model,
        ));
    }

    public function actionRegister() {
        $this->layout = 'search';
        $model = new Proprietario;
        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Proprietario'])) {
            $model->attributes = $_POST['Proprietario'];
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
                $mailer->Subject = Yii::t('demo', 'Confirmação de registo');
                $mailer->Send();
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->Send();
                $this->redirect(array('confirmacaoguest', 'id' => $id));
            }
        }
        $this->render('_form', array(
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
        $this->performAjaxValidation($model);
        if (isset($_POST['Proprietario'])) {
            $model->attributes = $_POST['Proprietario'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->propid));
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
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Proprietario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Proprietario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Proprietario']))
            $model->attributes = $_GET['Proprietario'];
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
        $model = Proprietario::model()->findByPk(Yii::app()->user->id);
        if (Yii::app()->user->name == 'Guest') {
            $criteria = new CDbCriteria;
            $criteria->compare('sessid', Yii::app()->session->sessionID);
            $model = Proprietario::model()->findByPk($id, $criteria);
        }
        if (Yii::app()->user->name == Yii::app()->params['adminEmail']) {
            $model = Proprietario::model()->findByPk($id);
        }
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'proprietario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
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

    public function actionPwdRecover() {
        $this->layout = 'search';
        if (isset($_POST['Proprietario']['email'])) {
            $model = Proprietario::model()->findByAttributes(array('email' => $_POST['Proprietario']['email'], 'activo' => 1));
            if ($model != NULL) {
                $mailer = Yii::createComponent('application.extensions.EMailer');
                $mailer->From = Yii::app()->params["noReplyEmail"];
                $mailer->AddAddress($model->email);
                $mailer->FromName = Yii::app()->name;
                $mailer->CharSet = 'UTF-8';
                $mailer->IsHTML(true);
                $mailer->getView('emailPwdRecoverProp', array('model' => $model), NULL);
                $mailer->Subject = 'A sua password';
                $mailer->Send();
                $this->redirect(array('pwdrecoverconfirm', 'id' => $model->propid, 'st' => $model->sessid));
            } else {
                Yii::app()->user->setFlash('error', $_POST['Proprietario']['email'] . ', Não existe ou não está activo', true);
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

    public function loadModelClientPwd($id, $st) {
        $model = Proprietario::model()->find('propid=' . $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
