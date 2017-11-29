<?php

class ReservaPaymentController extends Controller {

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        Yii::import('application.controllers.ReservaController');
        $reserva = new ReservaController(1);
        $payment = $this->loadModel($id);
        $model = $reserva->loadModel($payment->idreserva);
        $this->render('/reserva/view', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idreserva, $idpreco) {
        $model = new ReservaPayment;
        Yii::import('application.controllers.ReservaController');
        $reserva = new ReservaController(1234);
        $reservaModel = $reserva->loadModel($idreserva);
        if (isset($_POST['ReservaPayment'])) {
            $model->attributes = $_POST['ReservaPayment'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Ok com Payment!', true);
                $this->redirect(array('reserva/view', 'id' => $model->idreserva));
            } else {
                Yii::app()->user->setFlash('error', 'Erro com Payment!', true);
            }
        }
        $this->render('create', array(
            'model' => $model,
            "reserva" => $reservaModel
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id, $reserva, $casa) {
        $model = $this->loadModel($id, $reserva, $casa);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        if (isset($_POST['ReservaPayment'])) {
            $model->attributes = $_POST['ReservaPayment'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('ReservaPayment');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ReservaPayment('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ReservaPayment']))
            $model->attributes = $_GET['ReservaPayment'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($idreserva, $idpreco) {
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? ">= 1" : "=" . Yii::app()->user->id;

        $model = Reserva::model()->with('reservas.precos', 'reservas.precos.casas')->find("id=" . $idreserva . " AND casas.propid" . $uid);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadPayments($id) {
        $model = ReservaPayment::model()->findAll('idreserva=' . $id);
        //summ $model->value summ diferences
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reserva-payment-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
