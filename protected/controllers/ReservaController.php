<?php

class ReservaController extends Controller {

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
                'actions' => array('view', 'calculate', 'example', 'createspecial', 'load', 'showAvailability'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array("thankAndDetail", 'dashboard', "adminFeedback", 'remenberFeedback', 'admin', 'create', 'newCasa', 'createNew', 'update', 'adminAll', 'confirmacaoreserva', "remenberpay"),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'adminAll', 'update', 'prereservas', 'addToCalendar', 'updateEventId', 'remFromCalendar'),
                'users' => array(Yii::app()->params['adminEmail']),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
            array('deny',
                'actions' => array('update', 'index', 'view', 'create', 'delete', 'prereservas', 'load'),
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
    public function actionCalculate($id, $in, $out) {
        $reserva = new Reserva();
        echo CJSON::encode($reserva->calculatePrice($id, $in, $out));
    }

    public function actionThankAndDetail($id) {
        $model = $this->loadModel($id);
        $mailer = Yii::createComponent('application.extensions.EMailer');
        $mailer->From = Yii::app()->params["noReplyEmail"];
        $mailer->AddAddress($model->cliente->email);
        $mailer->FromName = Yii::app()->name;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->getView('thanksAndDetail', array('model' => $model), NULL);
        $mailer->Subject = Yii::t('demo', 'Reserva ') . $model->id;
        $mailer->Send();
        Yii::app()->user->setFlash('success', 'Ok. Reserva ' . $model->id . '<br>Foi enviado email de agradecimento para ' . $model->cliente->email, true);

// $mailer->AddAddress(Yii::app()->params['adminEmail']);
// $mailer->Send();
        $this->render('remenberPayment', array(
            'model' => $this->loadModel($id),
                // 'payments' => $payments,
        ));
    }

    public function actionRemenberpay($id) {
        $model = $this->loadModel($id);
        $mailer = Yii::createComponent('application.extensions.EMailer');
        $mailer->From = Yii::app()->params["noReplyEmail"];
        $mailer->AddAddress($model->cliente->email);
        $mailer->FromName = Yii::app()->name;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->getView('remenberPayment', array('model' => $model), NULL);
        $mailer->Subject = Yii::t('demo', 'Lembrete Pagamento pre reserva ') . $model->id;
        $mailer->Send();
        Yii::app()->user->setFlash('success', 'Ok. Pre Reserva ' . $model->id . '<br>Foi enviado email de lembrete para ' . $model->cliente->email, true);

// $mailer->AddAddress(Yii::app()->params['adminEmail']);
// $mailer->Send();
        $this->render('remenberPayment', array(
            'model' => $this->loadModel($id),
                // 'payments' => $payments,
        ));
    }

    public function actionRemenberFeedback($id) {
        $model = $this->loadModel($id);
        $mailer = Yii::createComponent('application.extensions.EMailer');
        $mailer->From = Yii::app()->params["noReplyEmail"];
        $mailer->AddAddress($model->cliente->email);
        $mailer->FromName = Yii::app()->name;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->getView('remenberFeedback', array('model' => $model), NULL);
        $mailer->Subject = Yii::t('demo', 'Lembrete para atribuir feedback reserva ') . $model->id;
        $mailer->Send();
        Yii::app()->user->setFlash('success', 'Ok. Reserva ' . $model->id . '<br>Foi enviado email de lembrete de feedback para ' . $model->cliente->email, true);

// $mailer->AddAddress(Yii::app()->params['adminEmail']);
// $mailer->Send();
        $this->render('remenberPayment', array(
            'model' => $this->loadModel($id),
                // 'payments' => $payments,
        ));
    }

    public function actionView($id) {
        /*  $reserva = new ReservaPayment();
          $payments = $reserva->loadPayments($id); */
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.yiiactiveform.js'] = false;
            Yii::app()->clientScript->scriptMap['Chart.js'] = false;
            $this->renderPartial('ajaxview', array(
                'model' => $this->loadModel($id),
                    // 'payments' => $payments,
                    ), false, true);
        } else {
            $this->render('view', array(
                'model' => $this->loadModel($id),
                    // 'payments' => $payments,
            ));
        }
    }

    public function actionLoad($id) {
        Yii::app()->clientScript->scriptMap['jquery.js'] = false;
        Yii::app()->clientScript->scriptMap['jquery.yiigridview.js'] = false;
        Yii::app()->clientScript->scriptMap['Chart.js'] = false;
        $this->renderPartial('load', array(
            'model' => $this->loadModel($id),
                // 'payments' => $payments,
                ), false, true);
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Reserva;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);
        if (isset($_POST['Reserva'])) {
            $model->attributes = $_POST['Reserva'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }
        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateNew() {
        $model = new Preco("client");

        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;

        $this->render('createNew', array(
            'model' => $model,
            'uid' => $uid,
        ));
    }

    public function actionNewCasa($id) {
        $model = new Preco("client");

        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;

        $this->render('//preco/_form', array(
            'model' => $model,
            'uid' => $uid,
            'cod_casa' => $id
        ));
    }

    public function actionCreateSpecial($id) {

        Yii::import('application.controllers.PrecoController');
        $preco = new PrecoController(1);
        $model = $preco->loadModelspecialoffer($id);
        $Reserva = new Reserva();
        if (isset($_POST['ContactCasaForm'])) {
            $Reserva->attributes = $_POST['ContactCasaForm'];
            $Reserva->idpreco = $id;
            $Reserva->idcliente = Yii::app()->user->id;
            $Reserva->reserva_state = Reserva::PRERESERVA;
            $Reserva->valor = $_POST['ContactCasaForm']['preco'];
            if ($Reserva->save()) {
                $idreserva = Yii::app()->db->lastInsertID;
                $ReservaEmail = $this->loadModelEmail($idreserva);
                $mailer = Yii::createComponent('application.extensions.EMailer');
                $mailer->From = Yii::app()->params["noReplyEmail"];
                $mailer->AddAddress($ReservaEmail->cliente->email);
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->FromName = Yii::app()->name;
                $mailer->CharSet = 'UTF-8';
                $mailer->IsHTML(true);
                $mailer->getView('emailConfirmaReserva', array('model' => $ReservaEmail), NULL);
                $mailer->Subject = Yii::t('demo', 'Obrigado pela sua Reserva!');
                $mailer->Send();
                $mailer->AddAddress(Yii::app()->params['adminEmail']);
                $mailer->Send();
                $this->redirect(array('ConfirmacaoReserva', 'id' => $idreserva));
                Yii::app()->user->setFlash('success', 'Ok.Reserva #' . $idreserva . '<br>Foi enviado email.', true);
            } else {
                Yii::app()->user->setFlash('error', 'Erro com Reserva!', true);
            }
        }
        $this->render('//reserva/_form_specialoffer', array(
            'model' => $model,
        ));
    }

    public function actionShowAvailability($id) {

        Yii::import('application.controllers.PrecoController');
        $preco = new PrecoController(1);
        $js = $preco->actionCalendar($id, '1');
        $Reserva = new Reserva();
        $this->renderPartial('//reserva/showCal', array(
            'js' => $js,
        ));
    }

    public function actionConfirmacaoReserva() {
        $this->layout = 'column1';
        $id = Yii::app()->getRequest()->getQuery('id');
        $model = $this->loadModelClient($id);
        $this->render('confirmacaoReserva', array(
            'model' => $model,
        ));
    }

    public function actionUpdateEventId($id) {

        $model = $this->loadModel($id);
        $model->eventid = "reserva$model->id";
        $model->save(false);
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
        $reserva = new Reserva();
        if (isset($_POST['Reserva'])) {
            if ($_POST['Reserva']['reserva_state'] == 2 || $_POST['Reserva']['reserva_state'] == 4) {

                $model->setScenario("reservado");
            }
            if ($reserva->checkDays($model, $_POST['Reserva']['reserva_state']) == 1) {
                $this->redirect(array('view', 'id' => $model->id));
            }
            $model->attributes = $_POST['Reserva'];
            $temreserva = Preco::model()->verifyReserva($model->idpreco);
            if ($temreserva === TRUE) {
                Yii::app()->user->setFlash('error', 'Esta reserva ja esta no estado Sinalizada ou Paga! Adicione um pagamento', true);
                unset($_POST['Reserva']);
                $this->redirect(array('view', 'id' => $model->id));
            }
            if ($temreserva === FALSE) {
                if ($model->validate() && $model->save()) {
                    Yii::app()->user->setFlash('success', ' Actualizado!', true);
                    if ($_POST['Reserva']['reserva_state'] == '2' || $_POST['Reserva']['reserva_state'] == '4') {
                        $precomodel = Preco::model()->findByPk($model->idpreco);
                        $precomodel->promo = 0;
                        $precomodel->livre = 0;
                        $precomodel->save();

                        $payment = new ReservaPayment();
                        $payment->attributes = $_POST['Reserva'];
                        $payment->idreserva = $_POST['Reserva']["id"];
                        $payment->savePayment($payment);
                    }
                    if ($_POST['Reserva']['reserva_state'] == Reserva::Anulada) {
                        $precomodel = Preco::model()->findByPk($model->idpreco);
                        $precomodel->promo = 0;
                        $precomodel->livre = 1;
                        $precomodel->save();
                    }
                    $reserva->sendMails($id, 'update');
                    $reserva->checkOutdated($id);

                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }
        $this->render('view', array(
            'model' => $model,
                // 'payments' => $payments,
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
            $model = $this->loadModel($id);
            $this->loadModel($id)->delete();
            Preco::model()->find("id=" . $model->idpreco)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Reserva');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionDashboard() {
        $this->render('dashboard');
    }

    public function actionAddToCalendar($id) {
        $this->render('addToCalendar', array("model" => $this->loadModel($id)));
    }

    public function actionRemFromCalendar($id) {
        $this->render('remCalendar', array("model" => $this->loadModel($id)));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Reserva('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reserva']))
            $model->attributes = $_GET['Reserva'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionAdminFeedback() {
        $model = new Reserva('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reserva']))
            $model->attributes = $_GET['Reserva'];
        $this->render('//reserva/adminFeedback', array(
            'model' => $model,
        ));
    }

    public function actionPrereservas() {
        $this->layout = 'column2';
        $model = new Reserva('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reserva']))
            $model->attributes = $_GET['Reserva'];
        $this->render('//reserva/prereservas', array(
            'model' => $model,
        ));
    }

    public function actionAdminAll($id) {
        $model = new Reserva('searchAll');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reserva']))
            $model->attributes = $_GET['Reserva'];
        $this->render('adminAll', array(
            'model' => $model,
            'cod_casa' => $id,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? ">= 1" : "=" . Yii::app()->user->id;
        $model = Reserva::model()->with('precos', "cliente", 'precos.casas', 'payments')->find('casas.propid' . $uid . ' AND t.id=' . $id);
        if ($model === null)
            throw new CHttpException(404, 'The requested  page does not exist.');
        return $model;
    }

    public function loadModelClient($id) {
        $model = Reserva::model()->with('precos', 'precos.casas')->findByPk($id);
        if ($model->idcliente != Yii::app()->user->id)
            throw new CHttpException(404, 'Not alowed.');
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelEmail($id) {
        $model = Reserva::model()->with('states', 'cliente', 'precos')->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reserva-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
