<?php

class PrecoController extends Controller {

    public $model;
    public $inic;
    public $fim;

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
                'actions' => array('callcalendar', 'index', 'view', 'test', 'confirmacaoReserva', 'search', 'deals'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('newCasa', 'new', 'clientCreate', 'create', 'update', 'admin', 'FailCreate', 'FailCreateReserva', 'calendar', 'adminPromo', 'deletePromo', 'updatePromo'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array(Yii::app()->params['adminEmail']),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionNewCasa($id) {
        $model = new Preco("client");
        if (isset($_POST['Preco'])) {
            $model->attributes = $_POST['Preco'];

            if ($model->save())
                $id = Yii::app()->db->getLastInsertID();
            Yii::app()->user->setFlash('success', Yii::t("content", "Promoção criada com sucesso Casa ") . $model->cod_casa, true);

            $this->redirect(array('adminPromo'));
        }
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;
        $this->actionValida($id);
        $this->render('createNew', array(
            'model' => $model,
            'uid' => $uid,
            'cod_casa' => $id
        ));
    }

    public function actionNew() {
        $model = new Preco("client");
        if (isset($_POST['Preco'])) {
            $model->attributes = $_POST['Preco'];

            if ($model->save())
                $id = Yii::app()->db->getLastInsertID();
            Yii::app()->user->setFlash('success', Yii::t("content", "Promoção criada com sucesso Casa ") . $model->cod_casa, true);

            $this->redirect(array('adminPromo'));
        }
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;

        $this->render('createNew', array(
            'model' => $model,
            'uid' => $uid,
        ));
    }

    public function actionDeals() {
        $this->layout = '//layouts/search';
        $model = new Preco;
        $dataProvider = new CActiveDataProvider('Preco', array(
            'criteria' => array(
                'with' => 'casas',
                'condition' => 't.promo=1 AND inicio > "' . date('Y/m/d') . '"',
            ),
        ));
        $this->render('//preco/index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id, $cod_casa) {
        Yii::import('application.controllers.CasaController');
        $modelCasa = CasaController::loadModel($cod_casa);
        $this->render('update', array(
            'model' => $this->loadModel($id),
            'cod_casa' => $cod_casa,
            'modelCasa' => $modelCasa,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionValida($id) {
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? " >=1" : "=" . Yii::app()->user->id;
        $segura = "select cod_casa,casa.propid from casa  inner join proprietario on casa.propid=proprietario.propid "
                . " where casa.cod_casa=" . $id . " and casa.propid" . $uid;
        $rows = Yii::app()->db->createCommand($segura)->queryAll();
        if (!$rows) {
            throw new CHttpException(404, 'The requested page does not exist valida.');
        }
    }

    public function actionFailCreate($cod_casa) {
        //Yii::app()->user->setFlash('error', 'Everything went wrong disponibilidade!',true);
        $this->redirect('Create' . '?cod_casa=' . $cod_casa);
    }

    public function actionFailCreateReserva($cod_casa) {
        // Yii::app()->user->setFlash('error', 'Everything went wrong Reserva!',true);
        $this->redirect('Create' . '?cod_casa=' . $cod_casa);
    }

    public function actionClientCreate() {
        Yii::app()->user->setReturnUrl('preco/clientCreate');
        $Reserva = new Reserva();
        $model = new Preco('client');
        $cod_casa = Yii::app()->getRequest()->getQuery('id');
        // $this->performAjaxValidation($model);
        if (isset($_POST['ContactCasaForm'])) {

            $model->attributes = $_POST['ContactCasaForm'];
            if ($Reserva->checkDaysRaw($model->cod_casa, $model->inicio, $model->fim)) {
                Yii::app()->user->setFlash('error', 'Erro com Reserva! Ja estão dias reservados.', true);
                $this->redirect(array('casa/client', 'id' => $model->cod_casa));
            }
            if (Yii::app()->user->getState('isAdmin') == 'Front') {

                if ($model->save()) {

                    Yii::app()->user->setFlash('success', 'Ok com disponibilidade!', true);
                    $id = Yii::app()->db->lastInsertID;
                    if (isset($_POST['ContactCasaForm'])) {

                        $Reserva->attributes = $_POST['ContactCasaForm'];
                        $Reserva->valor = $_POST['ContactCasaForm']['preco'];
                        $Reserva->valorSinal = round($_POST['ContactCasaForm']['preco'] / 3);
                        $Reserva->idpreco = $id;
                        $Reserva->idcliente = Yii::app()->user->id;
                        $Reserva->reserva_state = Reserva::PRERESERVA;
                        if ($Reserva->save()) {

                            $idreserva = Yii::app()->db->lastInsertID;
                            //$Reserva->checkOutdated($idreserva);
                            $Reserva->sendMails($idreserva, NULL);
                            $this->redirect(array('ConfirmacaoReserva', 'id' => $idreserva));
                            Yii::app()->user->setFlash('success', 'Ok.Reserva #' . $idreserva . '<br>Foi enviado email.', true);
                        } else {
                            Yii::app()->user->setFlash('error', 'Erro com Reserva!', true);
                        }
                    }
                    Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                    echo CJSON::encode(array('status' => '700', 'redirect' => Yii::app()->user->returnUrl));
                    Yii::app()->end();
                }
            } else {
                Yii::app()->user->setFlash('error', 'Erro com Reserva! Logado como proprietario', true);
                Yii::app()->user->returnUrl = Yii::app()->request->urlReferrer;
                echo CJSON::encode(array('status' => '400', 'redirect' => Yii::app()->user->returnUrl));
                Yii::app()->end();
            }
        }
    }

    public function actionUpdatePromo($id) {

        $model = $this->loadModelPromo($id);
        $this->render('updateDetail', array(
            'model' => $model,
        ));
    }

    public function actionConfirmacaoReserva() {
        $this->layout = 'cliente';
        Yii::import('application.controllers.ReservaController');
        $reserva = new ReservaController(10);
        $id = Yii::app()->getRequest()->getQuery('id');
        $model = $reserva->loadModelClient($id);
        $this->renderPartial('confirmacaoReserva', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $Pagamento = new ReservaPayment();
        $Reserva = new Reserva();
        $model = new Preco('create');
        $cod_casa = Yii::app()->getRequest()->getQuery('cod_casa');
        $this->actionValida($cod_casa);
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;

        $this->actionCalendar($cod_casa, 0);
        // $this->performAjaxValidation($model);
        if (isset($_POST['Preco'])) {
            $model->attributes = $_POST['Preco'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Ok com disponibilidade!');
                $id = Yii::app()->db->lastInsertID;
                if (isset($_POST['Reserva'])) {
                    $Reserva->attributes = $_POST['Reserva'];
                    $Reserva->valor = $_POST['Preco']['preco'];
                    $Reserva->user = $_POST['Reserva']['user'];
                    $Reserva->idpreco = $id;
                    $Reserva->reserva_state = $_POST['Reserva']['reserva_state'];
                    if ($Reserva->save()) {
                        $idreserva = Yii::app()->db->lastInsertID;
                        $Reserva->checkOutdated($idreserva);
                        $Reserva->sendMails($idreserva, NULL);
                    } else {

                        Yii::app()->user->setFlash('error', 'Erro com Reserva!');
                    }
                }
                if (isset($_POST['ReservaPayment'])) {
                    $Pagamento->attributes = $_POST['ReservaPayment'];
                    if (isset($idreserva)) {
                        $Pagamento->idreserva = $idreserva;
                    }
                    $Pagamento->idpreco = $id;
                    if ($Pagamento->save()) {
                        Yii::app()->user->setFlash('success', 'Ok com Periodo Reserva Pagamento !');
                    } else {
                        Yii::app()->user->setFlash('error', 'Pagamento não introduzido !');
                    }
                }
            }
        } else {
            Yii::app()->user->setFlash('error', 'Erro com Periodo Reserva e pagamento! Confira as datas em conflito');
        }
        if (isset($idreserva)) {

            $this->redirect(array('reserva/view/', 'id' => $idreserva, 'fromP' => '1',));
        } else {
            $this->redirect(array('casa/update/', 'id' => $cod_casa, 'fromP' => '1',));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        if (isset($_POST['Preco']['defaccao'])) {
            if ($_POST['Preco']['defaccao'] == 'del') {
                $this->redirect(array('delete', 'id' => $id, 'fromP' => '1', 'cod_casa' => $_POST['Preco']['cod_casa']));
            }
        }
        $cod_casa = Yii::app()->getRequest()->getQuery('cod_casa');
        //$model = Preco::model()->with('reservas')->findAllByPk($id);
        $model = $this->loadModel($id);
        $Reserva = new Reserva;
        Yii::import('application.controllers.ReservaController');
        Yii::import('application.controllers.CasaController');
        $casa = new CasaController(1);
        $modelCasa = $casa->loadModel($cod_casa);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $this->actionValida($cod_casa);
        $this->actionCalendar($cod_casa, $id);
        $preco = new Preco ();
        //  $result2 = $preco->verifyPrereserva($id);
        $result = $preco->verifyReserva($id);
        if ($result == false) {
            if (isset($_POST['Preco'])) {
                $model->attributes = $_POST['Preco'];
                if ($result == false) {
                    if ($model->save()) {
                        Yii::app()->user->setFlash('success', 'Ok com disponibilidade!', true);
                        if ($model->livre == true)
                            unset($_POST['Reserva']);
                        if ($model->livre == false) {
                            if (isset($_POST['Reserva'])) {
                                $Reserva->attributes = $_POST['Reserva'];
                                $Reserva->idpreco = $id;
                                $Reserva->save();
                                $Reserva->checkOutdated($idreserva);
                                Yii::app()->user->setFlash('success', 'Ok com Reserva!', true);
                            }
                        }
                    }
                }
            }
        }
        $this->render('//preco/update', array(
            'model' => $model,
            'modelCasa' => $modelCasa,
            'idpreco' => $id,
            'cod_casa' => $cod_casa,
        ));
    }

    public function actionDeletePromo($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModelPromo($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function loadModelPromo($id) {
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->addCondition("casas.propid $uid");
        $criteria->compare("t.id", $id);
        $model = Preco::model()->with('reservas', 'casas', 'casas.casasprop')->find($criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        /* if (Yii::app()->request->isPostRequest) {
          // we only allow deletion via POST request
          $this->loadModel($id)->delete();
          // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
          if (!isset($_GET['ajax']))
          $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
          }
          else
          throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
         */
        $per = $this->loadModel($id);
        $this->loadModel($id)->delete();
        Yii::app()->user->setFlash('success', 'deleted ' . $per->inicio . ' a ' . $per->fim, true);
        $cod_casa = Yii::app()->getRequest()->getQuery('cod_casa');
        $this->redirect(array('casa/update/' . $cod_casa . '?fromP=1'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->actionValida(Yii::app()->getRequest()->getQuery('id'));
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;
        $dataProvider = new CActiveDataProvider('Preco', array(
            'criteria' => array(
                'with' => 'casas',
                'condition' => 'casas.propid ' . $uid . 'and casas.cod_casa=' . Yii::app()->getRequest()->getQuery('id'),
            ),
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionAdminPromo() {
        $model = new Preco('search');
        //$this->actionValida();
        //$this->redirect('create?cod_casa='.$cod_casa,true);
//throw new CHttpException(404,'The requested  page does not exist.');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Preco']))
            $model->attributes = $_GET['Preco'];
        $this->render('adminPromo', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Preco('search');
        $this->actionValida();
        //$this->redirect('create?cod_casa='.$cod_casa,true);
//throw new CHttpException(404,'The requested  page does not exist.');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Preco']))
            $model->attributes = $_GET['Preco'];
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
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->select = "id,inicio,fim,preco,casa.cod_casa";
        $criteria->alias = "periodo";
        $criteria->join = "INNER JOIN  reserva  on reserva.precoid=id";
        $criteria->join = "INNER JOIN  casa on casa.cod_casa=periodo.cod_casa";
        $criteria->join .= " INNER JOIN proprietario ON casa.propid = proprietario.propid";
        $criteria->condition = "casa.propid" . $uid;
        //$criteria->condition = "reservas.reserva_state" ."=4";
        $model = Preco::model()->with('reservas', 'casas', 'casas.casasprop')->findByPk($id, $criteria);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelspecialoffer($id) {
        $model = Preco::model()->with('reservas', 'casas', 'casas.casasprop')->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionCallcalendar() {
        $cod_casa = Yii::app()->getRequest()->getQuery('cod_casa');
        $script = $this->actionCalendar($cod_casa, 0);
        echo $script;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'preco-form') {
            // echo CActiveForm::validate($model);
            // echo CHtml::errorSummary($model);
            Yii::app()->end();
        }
    }

    public function actionCalendar($cod_casa, $periodo) {
        $model = new Preco;
        $Reserva = new Reserva;
        $js = '';
        $now = new CDbExpression("CURDATE()");
        $myproc3 = "Select id,inicio,fim,promo,cod_casa from preco where cod_casa = " . $cod_casa . " and livre = 1 and fim > " . $now;
        $myproc2 = "Select preco.id,inicio,fim,promo,cod_casa from preco left join reserva on preco.id=reserva.idpreco where cod_casa = " . $cod_casa . " and livre = 0 and fim > " . $now . " and (reserva_state = " . Reserva::RESERVA . ' or reserva_state=' . Reserva::SINAL . ")";
        $livres = Yii::app()->db->createCommand($myproc3)->query()->readAll();
        $ocupas = Yii::app()->db->createCommand($myproc2)->query()->readAll();

        $livres2 = Yii::app()->db->createCommand($myproc3)->query()->readAll();
        $ocupas2 = Yii::app()->db->createCommand($myproc2)->query()->readAll();
        $js = $js . "arrayLivre = [";
        foreach ($livres as $livre) {
            $start = $livre['inicio'];
            $dtEnd = $livre['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($livre['inicio'])));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($livre['fim'])));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (isset($_POST['Preco'])) {
                    $model->attributes = $_POST['Preco'];
                    $inic = date('Y/m/j', strtotime($model->inicio));
                    $fim = date('Y/m/j', strtotime($model->fim));
                    While (strtotime($inic) <= strtotime($fim)) {
                        if ($inic == $dtLoop && $livre['id'] != $periodo) {
                            unset($_POST['Preco']);
                            unset($_POST['Reserva']);
                            //$this->redirect('FailCreate'.'?cod_casa='.$cod_casa,array('cod_casa'=>$cod_casa));
                            Yii::app()->user->setFlash('error', $dtLoop . ' pertence a uma disponibilidade predefinida! Apaga ou altere o período predefenido para poder reservar', true);
                        }
                        $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                    }
                }
                $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "," . $livre['id'] . "," . $livre['cod_casa'] . "]");
                $js = $js . (",");
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001,1,1]");
        $js = $js . ("];");
        $js = $js . ("arraylivreTransita = [");
        foreach ($livres2 as $livre2) {
            $start = $livre2['inicio'];
            $dtEnd = $livre2['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (strtotime($dtLoop) == strtotime($start)) {
                    $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "]");
                    $js = $js . (",");
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arraylivreTransitaFim = [");
        reset($livres);
        reset($livres2);
        foreach ($livres as $livre) {
            $start = $livre['inicio'];
            $dtEnd = $livre['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (strtotime($dtLoop) == strtotime($dtEnd)) {
                    $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "]");
                    $js = $js . (",");
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arrayOcupado =  [");
        if (isset($_POST['Preco'])) {
            $model->attributes = $_POST['Preco'];
            $inic = date('Y/m/j', strtotime($model->inicio));
            $fim = date('Y/m/j', strtotime($model->fim));
        }
        foreach ($ocupas as $ocupa) {
            $start = $ocupa['inicio'];
            $dtEnd = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($start)));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($dtEnd)));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (isset($_POST['Preco'])) {
                    $model->attributes = $_POST['Preco'];
                    $inic = date('Y/m/j', strtotime($model->inicio));
                    $fim = date('Y/m/j', strtotime($model->fim));
                    While (strtotime($inic) <= strtotime($fim)) {
                        if ($inic == $dtLoop && $ocupa['id'] != $periodo) {
                            unset($_POST['Preco']);
                            unset($_POST['Reserva']);
                            Yii::app()->user->setFlash('error', $dtLoop . 'Este dia ja esta reservado !', true);
                        }
                        $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                    }
                }
                $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "," . $ocupa['id'] . "," . $ocupa['cod_casa'] . "]");
                $js = $js . (",");
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001,1,1]");
        $js = $js . ("];");
        $js = $js . ("arrayOcupadoTransita =  [");
        reset($ocupas);
        foreach ($ocupas as $ocupa) {
            $start = $ocupa['inicio'];
            $dtEnd = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (strtotime($dtLoop) == strtotime($start)) {
                    $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "]");
                    $js = $js . (",");
                }
                $dtLoop = date('Y-m-j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        reset($ocupas);
        $js = $js . ("arrayOcupadoTransitaFim =  [");
        foreach ($ocupas as $ocupa) {
            $start = $ocupa['inicio'];
            $dtEnd = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                if (strtotime($dtLoop) == strtotime($dtEnd)) {
                    $js = $js . ("[" . date("m", strtotime($dtLoop)) . ", " . date("d", strtotime($dtLoop)) . ", " . date("Y", strtotime($dtLoop)) . "]");
                    $js = $js . (",");
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arrayLivreTransitaFimFull =  [");
        reset($livres);
        reset($livres2);
        foreach ($livres as $livre) {
            $start = $livre['inicio'];
            $dtEnd = $livre['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($start)));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($dtEnd)));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                foreach ($livres2 as $livre2) {
                    $start2 = $livre2['inicio'];
                    $dtEnd2 = $livre2['fim'];
                    $dtLoop2 = $start2;
                    While (strtotime($dtLoop2) <= strtotime($dtEnd2)) {
                        if (strtotime($start) == strtotime($dtEnd2)) {
                            $js = $js . ("[" . date("m", strtotime($start)) . ", " . date("d", strtotime($start)) . ", " . date("Y", strtotime($start)) . "]");
                            $js = $js . (",");
                            break 2;
                        }
                        if (strtotime($start2) == strtotime($dtEnd)) {
                            $js = $js . ("[" . date("m", strtotime($dtEnd)) . ", " . date("d", strtotime($dtEnd)) . ", " . date("Y", strtotime($dtEnd)) . "]");
                            $js = $js . (",");
                            break 2;
                        }
                        $dtLoop2 = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop2)));
                    }
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arrayOcupadoTransitaFimFull =  [");
        reset($ocupas);
        foreach ($ocupas as $ocupa) {
            $start = $ocupa['inicio'];
            $dtEnd = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                foreach ($ocupas2 as $ocupa2) {
                    $start2 = $ocupa2['inicio'];
                    $dtEnd2 = $ocupa2['fim'];
                    $dtLoop2 = $start2;
                    While (strtotime($dtLoop2) <= strtotime($dtEnd2)) {
                        if (strtotime($start) == strtotime($dtEnd2)) {
                            $js = $js . ("[" . date("m", strtotime($start)) . ", " . date("d", strtotime($start)) . ", " . date("Y", strtotime($start)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        if (strtotime($start2) == strtotime($dtEnd)) {
                            $js = $js . ("[" . date("m", strtotime($dtEnd)) . ", " . date("d", strtotime($dtEnd)) . ", " . date("Y", strtotime($dtEnd)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        $dtLoop2 = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop2)));
                    }
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arrayOcupadoLivreTransita  =  [");
        reset($ocupas2);
        reset($ocupas);
        reset($livres2);
        foreach ($ocupas as $ocupa) {
            $start2 = $ocupa['inicio'];
            $dtEnd2 = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                foreach ($livres2 as $livre2) {
                    $start = $livre2['inicio'];
                    $dtEnd = $livre2['fim'];
                    $dtLoop2 = $start2;
                    While (strtotime($dtLoop2) <= strtotime($dtEnd2)) {
                        if (strtotime($start) == strtotime($dtEnd2)) {
                            $js = $js . ("[" . date("m", strtotime($start)) . ", " . date("d", strtotime($start)) . ", " . date("Y", strtotime($start)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        if (strtotime($start2) == strtotime($dtEnd)) {
                            $js = $js . ("[" . date("m", strtotime($dtEnd)) . ", " . date("d", strtotime($dtEnd)) . ", " . date("Y", strtotime($dtEnd)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        $dtLoop2 = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop2)));
                    }
                }
                $dtLoop = date('Y-m-j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . ("arrayLivreOcupadoTransita  =  [");
        reset($ocupas2);
        reset($ocupas);
        reset($livres);
        reset($livres2);
        foreach ($livres as $livre) {
            $start = $livre['inicio'];
            $dtEnd = $livre['fim'];
            $dtLoop = date('Y/m/j', strtotime($start));
            $dtEnd = date('Y/m/j', strtotime($dtEnd));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                foreach ($ocupas as $ocupa) {
                    $start2 = $ocupa['inicio'];
                    $dtEnd2 = $ocupa['fim'];
                    $dtLoop2 = $start2;
                    While (strtotime($dtLoop2) <= strtotime($dtEnd2)) {
                        if (strtotime($dtEnd) == strtotime($start2)) {
                            $js = $js . ("[" . date("m", strtotime($start2)) . ", " . date("d", strtotime($start2)) . ", " . date("Y", strtotime($start2)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        if (strtotime($start2) == strtotime($dtEnd)) {
                            $js = $js . ("[" . date("m", strtotime($dtEnd)) . ", " . date("d", strtotime($dtEnd)) . ", " . date("Y", strtotime($dtEnd)) . "]");
                            $js = $js . (",");
                            break 2;
                            break 1;
                        }
                        $dtLoop2 = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop2)));
                    }
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        $js = $js . ("[ 1, 11, 2001]");
        $js = $js . ("];");
        $js = $js . '

function testa(clas,periodo,casa)
{

$("." +periodo + " > a").livequery("click",function(event){


event.stopImmediatePropagation();
window.location = $(".updater").attr("href");

});

$("." +periodo).livequery("mouseover",function(){

$("." +periodo).addClass("periodoactivo");
var per=periodo;
var cod_casa=casa;
var position = $("." +periodo).position();



$(".updater").attr("href", "/index.php/casa/update/"+cod_casa  +"?idpreco="+per);

});
$("." +periodo).livequery("mouseout",function(){


$("." +periodo).removeClass("periodoactivo");


});
}


function testaocupa(clas2,periodo2,casa)
{

$(".menuPrecoOperations").hide();

$("." +periodo2 + " > a").livequery("click",function(event){

event.stopImmediatePropagation();
window.location = $(".updater").attr("href");
});

$("." +periodo2).livequery("mouseover",function(){

$("." +periodo2).addClass("periodoactivo2");
var cod_casa = casa
var per=periodo2;


$(".updater").attr("href", "/index.php/casa/update/"+cod_casa  +"?idpreco="+per);

});

$("." +periodo2).livequery("mouseout",function(){

$("." +periodo2).removeClass("periodoactivo2");


});
}


function ocupaDays(date) {

testa(1,1,1);

for (k=0;k<arrayLivre.length;k++)
{
if (date.getMonth() == arrayLivre[k][0] - 1
&& date.getDate() == arrayLivre[k][1]
&& date.getFullYear() == arrayLivre[k][2]) {
var periodo=arrayLivre[k][3]
var casa=arrayLivre[k][4]
testa("desocupa",periodo,casa);

return [true, "desocupa " + periodo, "Promoção/last minute"];

}

}

for (i = 0; i < arrayLivreTransitaFimFull.length; i++) {
      if (date.getMonth() == arrayLivreTransitaFimFull[i][0] - 1
          && date.getDate() == arrayLivreTransitaFimFull[i][1]
          && date.getFullYear() == arrayLivreTransitaFimFull[i][2]) {
        return [true, "transita_full_livre","Inicio disponibilidade e $fim disponibilidade" ];
      }
    }
  for (i = 0; i < arrayLivreOcupadoTransita.length; i++) {
      if (date.getMonth() == arrayLivreOcupadoTransita[i][0] - 1
          && date.getDate() == arrayLivreOcupadoTransita[i][1]
          && date.getFullYear() == arrayLivreOcupadoTransita[i][2]) {
        return [true, "LivreOcupadoTransita","Saída e Entrada" ];
      }
    }
  for (i = 0; i < arrayOcupadoLivreTransita.length; i++) {
      if (date.getMonth() == arrayOcupadoLivreTransita[i][0] - 1
          && date.getDate() == arrayOcupadoLivreTransita[i][1]
          && date.getFullYear() == arrayOcupadoLivreTransita[i][2]) {
        return [true, "OcupadoLivreTransita","Saída / Entrada" ];
      }
    }


for (i = 0; i < arrayOcupadoTransitaFimFull.length; i++) {
      if (date.getMonth() == arrayOcupadoTransitaFimFull[i][0] - 1
          && date.getDate() == arrayOcupadoTransitaFimFull[i][1]
          && date.getFullYear() == arrayOcupadoTransitaFimFull[i][2]) {
        return [true, "transita_full_ocupado","Saída e Entrada" ];
      }
    }



for (z = 0;z < arraylivreTransita.length;z++) {
if (date.getMonth() == arraylivreTransita[z][0] - 1
&& date.getDate() == arraylivreTransita[z][1]
&& date.getFullYear() == arraylivreTransita[z][2]) {
return [true, "transita_1", "Inicio disponibilidade"];

}
}

for (y = 0;y < arraylivreTransitaFim.length;y++) {
if (date.getMonth() == arraylivreTransitaFim[y][0] - 1
&& date.getDate() == arraylivreTransitaFim[y][1]
&& date.getFullYear() == arraylivreTransitaFim[y][2]) {
return [true, "transita_2", "Fim disponibilidade"];

}
}

for (i = 0;i < arrayOcupado.length;i++) {
if (date.getMonth() == arrayOcupado[i][0] - 1
&& date.getDate() == arrayOcupado[i][1]
&& date.getFullYear() == arrayOcupado[i][2]) {
var periodo=arrayOcupado[i][3]
var casa=arrayOcupado[i][4]
testaocupa("ocupa",periodo,casa);


return [true, "ocupa " + periodo, "Este dia esta ocupado"];
}
}



for (i = 0;i < arrayOcupadoTransita.length;i++) {
if (date.getMonth() == arrayOcupadoTransita[i][0] - 1
&& date.getDate() == arrayOcupadoTransita[i][1]
&& date.getFullYear() == arrayOcupadoTransita[i][2]) {
return [true, "transita_1_ocupa", "Entrada"];
}
}



for (i = 0;i < arrayOcupadoTransitaFim.length;i++) {
if (date.getMonth() == arrayOcupadoTransitaFim[i][0] - 1
&& date.getDate() == arrayOcupadoTransitaFim[i][1]
&& date.getFullYear() == arrayOcupadoTransitaFim[i][2]) {
return [true, "transita_2_ocupa", "Saída"];


}
}
return [true, ""];

}

function Days(date) {



for (k=0;k<arrayLivre.length;k++)
{
if (date.getMonth() == arrayLivre[k][0] - 1
&& date.getDate() == arrayLivre[k][1]
&& date.getFullYear() == arrayLivre[k][2]) {
var periodo=arrayLivre[k][3]
var casa=arrayLivre[k][4]


return [true, "desocupa", "Promoção/last minute"];

}

}

for (i = 0; i < arrayLivreTransitaFimFull.length; i++) {
      if (date.getMonth() == arrayLivreTransitaFimFull[i][0] - 1
          && date.getDate() == arrayLivreTransitaFimFull[i][1]
          && date.getFullYear() == arrayLivreTransitaFimFull[i][2]) {
        return [true, "transita_full_livre","Inicio disponibilidade e $fim disponibilidade" ];
      }
    }
  for (i = 0; i < arrayLivreOcupadoTransita.length; i++) {
      if (date.getMonth() == arrayLivreOcupadoTransita[i][0] - 1
          && date.getDate() == arrayLivreOcupadoTransita[i][1]
          && date.getFullYear() == arrayLivreOcupadoTransita[i][2]) {
        return [true, "LivreOcupadoTransita","Saída e Entrada" ];
      }
    }
  for (i = 0; i < arrayOcupadoLivreTransita.length; i++) {
      if (date.getMonth() == arrayOcupadoLivreTransita[i][0] - 1
          && date.getDate() == arrayOcupadoLivreTransita[i][1]
          && date.getFullYear() == arrayOcupadoLivreTransita[i][2]) {
        return [true, "OcupadoLivreTransita","Saída / Entrada" ];
      }
    }


for (i = 0; i < arrayOcupadoTransitaFimFull.length; i++) {
      if (date.getMonth() == arrayOcupadoTransitaFimFull[i][0] - 1
          && date.getDate() == arrayOcupadoTransitaFimFull[i][1]
          && date.getFullYear() == arrayOcupadoTransitaFimFull[i][2]) {
        return [true, "transita_full_ocupado","Saída e Entrada" ];
      }
    }



for (z = 0;z < arraylivreTransita.length;z++) {
if (date.getMonth() == arraylivreTransita[z][0] - 1
&& date.getDate() == arraylivreTransita[z][1]
&& date.getFullYear() == arraylivreTransita[z][2]) {
return [true, "transita_1", "Inicio disponibilidade"];

}
}

for (y = 0;y < arraylivreTransitaFim.length;y++) {
if (date.getMonth() == arraylivreTransitaFim[y][0] - 1
&& date.getDate() == arraylivreTransitaFim[y][1]
&& date.getFullYear() == arraylivreTransitaFim[y][2]) {
return [true, "transita_2", "Fim disponibilidade"];

}
}

for (i = 0;i < arrayOcupado.length;i++) {
if (date.getMonth() == arrayOcupado[i][0] - 1
&& date.getDate() == arrayOcupado[i][1]
&& date.getFullYear() == arrayOcupado[i][2]) {
var periodo=arrayOcupado[i][3]
var casa=arrayOcupado[i][4]

return [true, "ocupa", "Este dia esta ocupado"];
}
}



for (i = 0;i < arrayOcupadoTransita.length;i++) {
if (date.getMonth() == arrayOcupadoTransita[i][0] - 1
&& date.getDate() == arrayOcupadoTransita[i][1]
&& date.getFullYear() == arrayOcupadoTransita[i][2]) {
return [true, "transita_1_ocupa", "Entrada"];
}
}



for (i = 0;i < arrayOcupadoTransitaFim.length;i++) {
if (date.getMonth() == arrayOcupadoTransitaFim[i][0] - 1
&& date.getDate() == arrayOcupadoTransitaFim[i][1]
&& date.getFullYear() == arrayOcupadoTransitaFim[i][2]) {
return [true, "transita_2_ocupa", "Saída"];


}
}
return [true, ""];

}
';
        Yii::app()->clientScript->registerScript('22345672', $js, CClientScript::POS_END);
        return $js;
    }

    public function actionSearch() {
        $model = new Preco;
        $this->renderPartial('quicksearch', array(
            'model' => $model,
        ));
    }

}
