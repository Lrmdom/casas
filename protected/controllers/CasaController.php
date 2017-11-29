<?php

Yii::import("ext.xupload.models.XUploadForm");

class CasaController extends Controller {

    public $model;
    public $inic;
    public $fim;
    public $subfolderVar = false;

    /**
     * Full path of the main uploading folder.
     * @see XUploadAction::init()
     * @var string
     * @since 0.1
     */
    public $path;

    /**
     * The resolved subfolder to upload the file to
     * @var string
     * @since 0.2
     */
    private $_subfolder;

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
            //'ext.seo.components.SeoFilter + view',
            'accessControl', // perform access control for CRUD operations
        );
    }

    /*     * ClientCreateReserva
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('contactOwner', 'searchDates', 'searchLocal', 'translate', 'tologin', 'fplist', 'print', 'AutocompleteSearchCod', 'AutocompleteSearch', 'ConfirmacaoContacto', 'contactMe', 'MapSearch', 'searchMap', 'client', 'index', 'view', 'dynamicTipo', 'dynamicTipoAloja', 'dynamicLocalidade', 'dynamicPessoas', 'search', 'searchByDate', 'clientdialog', 'searchXhr', 'searchByDateXhr'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('ClientCreateReserva', 'addcasa'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('showStats', 'stats', 'statsBookings', 'sendToFacebook', 'create', 'switch', 'update', 'admin', 'uploadcasaimages', 'uploadimg', 'MostraImages', 'Sesschange'),
                'users' => array('@'),
                'expression' => "( Yii::app()->user->name ==  Yii::app()->params['adminEmail'] ) || ( Yii::app()->user->isAdmin ==  'Back' )",
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'update'),
                'users' => array(Yii::app()->params['adminEmail']),
            ),
            array('deny', // deny all users
                'actions' => array('ClientCreateReserva'),
                'expression' => "( Yii::app()->user->name ==  'Guest' ) ",
                'deniedCallback' => array($this, 'actionTologinClient'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
                'deniedCallback' => array($this, 'actionTologin'),
            ),
            array('deny',
                'actions' => array('update', 'index', 'view', 'create', 'delete', 'sendToFacebook'),
                'expression' => '$_GET[\'id\'] !== Yii::app()->user->id ',
                'expression' => "( Yii::app()->user->name !==  Yii::app()->params['adminEmail'] ) || ( Yii::app()->user->isAdmin !==  'Back' )",
                'message' => "Não Autorizado!",
            ),
        );
    }

    public function actionSendToFacebook($id) {
        $fbpost = new FbPost();

        $fbpost->post($id, 'casa');
        $model = new Casa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Casa']))
            $model->attributes = $_GET['Casa'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionStatsBookings() {
        $model = new Casa();
        $this->render('//dashboard/stats', array("model" => $model)
        );
    }

    public function actionShowStats($id) {
        $model = new Casa();
        $model = $this->loadModel($id);
        $reservas = $model->precos;

        $this->renderPartial('//dashboard/houseStats', array("model" => $model)
        );
    }

    public function loadStatsReservas($id) {

    }

    public function actionStats() {
        $this->render('//dashboard/analytics');
    }

    public function actionSwitch($id, $attribute) {

        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            if ($attribute === "certif" && Yii::app()->user->name !== Yii::app()->params["adminEmail"])
                throw new CHttpException(400, Yii::t("content", "Não esta autorizado a certificar casas!"));

            $model = $this->loadModel($id);
            $model->$attribute = ($model->$attribute == 0) ? 1 : 0;
            $model->save(false);

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionTranslate() {
        header('Content-type: text/html; charset=utf-8');

        echo utf8_encode(Casa::model()->translate($_POST["text"], $_POST["lang"]));
    }

    public function actionUpdateDates() {
        Periodo::model()->updateDates();
    }

    public function actionTologin() {
        Yii::app()->controller->redirect(array('/site/loginowner'));
    }

    public function actionTologinClient() {
        Yii::app()->controller->redirect(array('/site/login'));
    }

    public function actionFplist() {
        $data = Casa::model()->findAllBySql('select * from casa where activo=1 order by cod_casa desc LIMIT 8');
        $this->renderPartial('fPageList', array(
            'data' => $data,
        ));
    }

    public function actionConfirmacaoContacto() {
        $this->render('confirmacaoContacto', array(
            'model' => 1,
        ));
    }

    public function actionAddCasa() {
        $this->render('_form', array(
            'model' => $model,
        ));
    }

    public function actionContactMe() {
        $model = new ContactCasaForm();
        if (isset($_POST['ContactCasaForm'])) {
            $model->attributes = $_POST['ContactCasaForm'];
            $mailer = Yii::createComponent('application.extensions.EMailer');
            //$mailer->Host = 'smtp.casasdapraia.pt';
            //$mailer->IsSMTP();
            $mailer->From = Yii::app()->params["noReplyEmail"];
            //$mailer->AddReplyTo('l.r.m.d@sapo.pt');
            $mailer->AddAddress($model->email);
            $mailer->FromName = $model->name;
            $mailer->CharSet = 'UTF-8';
            $mailer->IsHTML(true);
            $mailer->getView('emailContactoCasaForm', array('model' => $model), NULL);
            $mailer->Subject = Yii::t('demo', 'Pedido de informação');
            $mailer->Send();
            $mailer->AddAddress(Yii::app()->params['adminEmail']);
            $mailer->Send();



            $this->redirect(array('ConfirmacaoContacto', 'model' => 1));
        }
        $this->render('_form', array(
            'model' => $model,
        ));
    }

    public function actionContactOwner() {
        $model = new ContactCasaForm();
        if (isset($_POST['ContactCasaForm'])) {
            $model->attributes = $_POST['ContactCasaForm'];
            $mailer = Yii::createComponent('application.extensions.EMailer');
            $mailer->From = Yii::app()->params["noReplyEmail"];
            $mailer->AddAddress($model->email);
            $mailer->FromName = $model->name;
            $mailer->CharSet = 'UTF-8';
            $mailer->IsHTML(true);
            $mailer->getView('emailContactoCasaForm', array('model' => $model), NULL);
            $mailer->Subject = Yii::t('demo', 'Pedido de informação');
            $mailer->Send();
            $mailer->AddAddress(Yii::app()->params['adminEmail']);
            $mailer->Send();



            $this->redirect(array('ConfirmacaoContacto', 'model' => 1));
        }
        $this->render('_form', array(
            'model' => $model,
        ));
    }

    public function actionAutocompleteSearch() {
        $res = array();
        $term = Yii::app()->getRequest()->getParam('term', false);
        if ($term) {
            if (is_numeric($term)) {
                $sql = 'SELECT DISTINCT cod_casa,tipo,tipoalojamento FROM casa where cod_casa LIKE :name and activo=1';
            } else {
                $sql = 'SELECT DISTINCT localidade, concelho,pais,count(cod_casa) as ncasas FROM casa where LCASE(localidade) LIKE :name and activo=1 group by localidade, concelho,pais';
            }
            // test table is for the sake of this example
            $cmd = Yii::app()->db->createCommand($sql);
            $cmd->bindValue(":name", "%" . strtolower($term) . "%", PDO::PARAM_STR);
            $res = $cmd->queryAll();
        }
        if (is_numeric($term)) {
            echo CJSON::encode($res);
            Yii::app()->end();
        }
        if (isset($res[0]['localidade'])) {
            echo CJSON::encode($res);
            Yii::app()->end();
        } else {
            $res = array();
            echo CJSON::encode($res);
            Yii::app()->end();
        }
    }

    public function actionAutocompleteSearchCod() {
        $res = array();
        $term = Yii::app()->getRequest()->getParam('term', false);
        if ($term) {
            // test table is for the sake of this example
            $sql = 'SELECT DISTINCT cod_casa,tipo,tipoalojamento FROM casa where cod_casa = :casa and activo=1';
            $cmd = Yii::app()->db->createCommand($sql);
            $cmd->bindValue(":casa", strtolower($term), PDO::PARAM_STR);
            $res = $cmd->queryAll();
        }
        echo CJSON::encode($res);
        Yii::app()->end();
    }

    public function actionDynamicTipo() {
        $model = new Casa;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            //$model->setAttribute($_POST['sType'], 1);
        }

        $data = $model->isearchMap()->getData();
        $data = CHtml::listData($data, 'tipo', 'tipo');

        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Todas Tipologias'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicTipoAloja() {
        $model = new Casa;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            //$model->setAttribute($_POST['sType'], 1);
        }

        $data = $model->isearchMap()->getData();
        $data = CHtml::listData($data, 'tipoalojamento', 'tipoalojamento');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Todos Tipos'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicLocalidade() {
        $model = new Casa;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            // $model->setAttribute($_POST['sType'], 1);
        }

        $data = $model->isearchMap()->getData();
        $data = CHtml::listData($data, 'localidade', 'localidade');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Todas Localidades'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicPessoas() {
        $model = new Casa;
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            // $model->setAttribute($_POST['sType'], 1);
        }

        $data = $model->isearchMap()->getData();
        $data = CHtml::listData($data, 'pessoas', 'pessoas');
        echo CHtml::tag('option', array('value' => ''), CHtml::encode('Pessoas'), true);
        foreach ($data as $value => $name) {
            echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
        }
    }

    public function actionSesschange($id) {
        $_SESSION['views'] = $id - 1;
        echo $_SESSION['views'];
    }

    public function actionUploadimg($id) {
        if (isset($_SESSION['views']))
            $_SESSION['views'] = $_SESSION['views'] + 1;
        else
            $_SESSION['views'] = 1;
        echo "Views=" . $_SESSION['views'];
        $model = new XUploadForm();
        $model2 = $this->loadModel($id);
        if (!isset($this->path)) {
            $this->path = realpath(Yii::app()->getBasePath() . "/../uploads");
        }
        if (!is_dir($this->path)) {
            throw new CHttpException(500, "{$this->path} does not exists.");
        } else if (!is_writable($this->path)) {
            throw new CHttpException(500, "{$this->path} is not writable.");
        }
        if ($this->subfolderVar !== false) {
            $this->_subfolder = Yii::app()->request->getQuery($this->subfolderVar, $model2->cod_casa);
        } else {
            $this->_subfolder = $model2->cod_casa;
        }
        //$this->init();
        $model->file = CUploadedFile::getInstance($model2, 'file');
        $model->mime_type = $model->file->getType();
        $model->size = $model->file->getSize();
        $model->name = $model->file->getName();
        if ($model->validate()) {
            $path = $this->path . "/" . $this->_subfolder . "/";
            if (!is_dir($path)) {
                mkdir($path);
            }
            //echo    $this->actionImgcount();
            // foreach($model->file  as $file){
            $model->file->saveAs($path . $model2->cod_casa . $model->name);
            //  $file->saveAs($path.$model2->cod_casa.$model->name);
            $img = Yii::app()->simpleImage->load($path . $model2->cod_casa . $model->name);
            $img->resize(400, 300);
            $img->save($path . $model2->cod_casa . $model->name);
            if ($_SESSION['views'] == 1) {
                $model2->img_1 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
            } elseif ($_SESSION['views'] == 2) {
                $model2->img_2 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
            } elseif ($_SESSION['views'] == 3) {
                $model2->img_3 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
            } elseif ($_SESSION['views'] == 4) {
                $model2->img_4 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
            } elseif ($_SESSION['views'] == 5) {
                $model2->img_5 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
            } elseif ($_SESSION['views'] == 6) {
                $model2->img_6 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
                echo CVarDumper::dumpAsString($model2->getErrors());
            } elseif ($_SESSION['views'] == 7) {
                $model2->img_7 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
                //execute the trigger of ajaxlink
            } elseif ($_SESSION['views'] == 8) {
                $model2->img_8 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
                //execute the trigger of ajaxlink
            } elseif ($_SESSION['views'] == 9) {
                $model2->img_9 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
                //execute the trigger of ajaxlink
            } elseif ($_SESSION['views'] == 10) {
                $model2->img_10 = $this->_subfolder . '/' . $model2->cod_casa . $model->name;
                $model2->save(false);
                //execute the trigger of ajaxlink
            }
            echo json_encode(array("name" => $model->name, "type" => $model->mime_type, "size" => $model->getReadableFileSize()));
        } else {
            echo CVarDumper::dumpAsString($model->getErrors());
            Yii::log("XUploadAction: " . CVarDumper::dumpAsString($model->getErrors()), CLogger::LEVEL_ERROR, "application.extensions.xupload.actions.XUploadAction");
            throw new CHttpException(500, "Could not upload file");
        }
        if ($_SESSION['views'] == 6)
            unset($_SESSION['views']);
    }

    public function actionUploadCasaImages($id) {
        $this->render('uploadCasaImages', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionMostraImages($id) {
        $this->renderPartial('refreshimages', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->layout = "column2";

        Yii::import('application.controllers.PrecoController');
        $pc = new PrecoController(11112222);
        $js = $pc->actionCalendar($id, '1');
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'js' => $js
        ));
    }

    public function actionPrint($id) {
        $this->render('print', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionClient($id) {

        $m = $this->m;
        $this->layout = "search";
        Yii::import('application.controllers.PrecoController');
        $pc = new PrecoController(111122);
        $js = $pc->actionCalendar($id, '1');
        $client = new Cliente();
        if (!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') == 'Front') {
            $client = Cliente::model()->findByPk(Yii::app()->user->getId());
        }
        $this->render('clientView', array(
            'model' => $this->loadClientModel($id),
            'js' => $js,
            'client' => $client,
            'm' => $m,
        ));
    }

    public function actionClientdialog($id) {
        $this->layout = '';
        Yii::import('application.controllers.PrecoController');
        $pc = new PrecoController(1111);
        $js = $pc->actionCalendar($id, '1');
        $this->renderPartial('clientViewdialog', array(
            'model' => $this->loadClientModel($id),
            'js' => $js
        ));
    }

    public function actionClientCreateReserva($id) {
        $this->layout = 'cliente';
        Yii::import('application.controllers.PrecoController');
        $pc = new PrecoController(111122);
        $js = $pc->actionCalendar($id, '1');
        $this->render('clientView', array(
            'model' => $this->loadClientModel($id),
            'js' => $js
        ));
    }

//TODO jhdsjfh
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        if (Yii::app()->user->name == Yii::app()->params['adminEmail']) {
            $model = new Casa('admin');
        } else {

            $model = new Casa('notCertif');
        }

        //Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['Casa'])) {

            $model->attributes = $_POST['Casa'];

            if ($model->save()) {
                $id = Yii::app()->db->lastInsertID;

                $smessag = new SourceMessage();
                $smessag->category = 'content';
                $smessag->message = $model->seo_title;
                $smessag->save();

                $trans = Casa::model()->storeTranslation($model);
                Yii::app()->user->setFlash('success', Yii::t("content", "Casa adicionada com sucesso. Faça upload de fotos e configure preços."), true);
                $this->redirect(array('update', 'id' => $id));
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
        if (Yii::app()->user->name == Yii::app()->params['adminEmail']) {
            $model->setScenario("admin");
        } else {
            $model->setScenario("notcertif");
        }

        if ($_GET['idpreco']) {
            $preco = Preco::model()->find('id =' . Yii::app()->getRequest()->getQuery('idpreco'));
        } else {
            $preco = NULL;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $smessag = new SourceMessage();
        $smessag = $smessag->with('messages')->find('message="' . $model->seo_title . '"');
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];

            if ($model->save()) {
                $smessag = $smessag->with('messages')->find('message="' . $model->seo_title . '"');
                if (!isset($smessag)) {
                    $smessag = new SourceMessage();
                    $smessag->message = $model->seo_title;
                    $smessag->category = 'content';
                    $smessag->save();
                    $smessag = Casa::model()->storeTranslationUpdate($model, $smessag);
                } else {

                    $smessag->message = $model->seo_title;
                    $smessag->category = 'content';
                    $smessag->update();
                    $smessag = Casa::model()->storeTranslationUpdate($model, $smessag);
                }
                Yii::app()->user->setFlash('success', Yii::t("content", "Casa atualizada com sucesso."), true);


//                $fbpost = new FbPost();
                // $fbpost->post($id, 'casa');
            }
        }
        $this->render('update', array(
            'model' => $model,
            'preco' => $preco,
            'cod_casa' => $model->cod_casa,
            'trans' => $smessag
        ));
    }

    /**
     *  Deletes a pa rticular mode


      l.
     * If delet

      ion is succes sful, the bro

      wser will be

      redirected to  the 'admin'







      page.
     * @para

      m integer $id



      the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
// $this->loadModel($id)->delete();
            $model = $this->loadModel($id);
            if ($model->activo == 1)
                $this->loadModel($id)->updateByPk($id, array('activo' => 0));
            if ($model->activo == 0)
                $this->loadModel($id)->updateByPk($id, array('activo' => 1));
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
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;
        $dataProvider = new CActiveDataProvider('Casa', array(
            'criteria' => array(
                'with' => 'casas',
                'condition' => 'casas.propid ' . $uid,
            ),
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Casa('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Casa']))
            $model->attributes = $_GET['Casa'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionSearch() {
        $this->layout = 'search';
        $model = new Casa('isearch');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.rating.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');

        $model->unsetAttributes();

        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            if (isset($_POST['sType']))
                $model->setAttribute($_POST['sType'], true);
        }
        if (isset($_GET['Casa'])) {
            $model->attributes = $_GET['Casa'];
            if (isset($_GET['sType']))
                $model->setAttribute($_GET['sType'], true);
        }

        $this->render('quickSearch', array(
            'model' => $model,
        ));
    }

    public function actionSearchLocal() {
        $this->layout = 'search';
        $model = new Casa('isearch');
        Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl . '/css/jquery.rating.css');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');

        $model->unsetAttributes();


        if (isset($_GET['sType']))
            $model->setAttribute($_GET['sType'], true);
        $model->localidade = $_GET["localidade"];

        $this->render('quickSearch', array(
            'model' => $model,
        ));
    }

    public function actionSearchXhr() {
        $model = new Casa('isearch');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {
            $model->attributes = $_POST['Casa'];
            if (isset($_POST['sType']))
                $model->setAttribute($_POST['sType'], 1);
        }
        if (isset($_GET['Casa'])) {
            $model->attributes = $_GET['Casa'];


            if (isset($_GET['sType']))
                $model->setAttribute($_GET['sType'], 1);
        }

        $this->renderPartial('quickSearch', array(
            'model' => $model,
                ), false, true);
    }

    public function actionSearchByDate() {
        $this->layout = 'search';
        $model = new Casa();
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {

            $model->attributes = $_POST['Casa'];
            $model->setAttribute($_POST['sType'], 1);
            $model->inicio = $_POST['Casa']['inicio'];
            $model->fim = $_POST['Casa']['fim'];
            /* if ($_POST['Casa']['inicio'])
              $_SESSION['inicio'] = $_POST['Casa']['inicio'];
              if ($_POST['Casa']['fim'])
              $_SESSION['fim'] = $_POST['Casa']['fim']; */
        }
        if (isset($_GET['Casa'])) {

            $model->attributes = $_GET['Casa'];
            $model->setAttribute($_GET['sType'], 1);
            $model->inicio = $_GET['Casa']['inicio'];
            Yii::app()->session['inicio'] = $model->inicio;
            $model->fim = $_GET['Casa']['fim'];
            Yii::app()->session['fim'] = $model->fim;


            /* if ($_GET['Casa']['inicio'])
              $_SESSION['inicio'] = $_GET['Casa']['inicio'];
              if ($_GET['Casa']['fim'])
              $_SESSION['fim'] = $_GET['Casa']['fim']; */
        }
//   $results = $model->findAll("for_rent=1 and activo=1");
        $results = $model->isearchMapMap()->getData();
        $res = $model->filterByDate($results, date("Y-m-d", strtotime($model->inicio)), date("Y-m-d", strtotime($model->fim)));
        $this->render('quicksearchbydate', array(
            'model' => $model,
            'results' => $res,
            'inicio' => date("Y-m-d", strtotime($model->inicio)),
            'fim' => date("Y-m-d", strtotime($model->fim)),
        ));
    }

    public function actionSearchDates() {
        $model = new Casa();
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Preco'])) {

            $model->attributes = $_POST['Preco'];
            $model->setAttribute('for_rent', 1);
            $model->inicio = $_POST['Preco']['inicio'];
            $model->fim = $_POST['Preco']['fim'];
        }

        $results = $model->isearchMapMap()->getData();
        $res = $model->filterByDate($results, date("Y-m-d", strtotime($model->inicio)), date("Y-m-d", strtotime($model->fim)));
        $this->renderPartial('quicksearchdates', array(
            'model' => $model,
            'results' => $res,
            'inicio' => date("Y-m-d", strtotime($model->inicio)),
            'fim' => date("Y-m-d", strtotime($model->fim)),
        ));
    }

    public function actionSearchByDateXhr() {
        $model = new Casa();
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.rating.js');

        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Casa'])) {

            $model->attributes = $_POST['Casa'];
            $model->setAttribute($_POST['sType'], 1);
            $model->inicio = $_POST['Casa']['inicio'];
            $model->fim = $_POST['Casa']['fim'];

            /* if ($_POST['Casa']['inicio'])
              $_SESSION['inicio'] = $_POST['Casa']['inicio'];
              if ($_POST['Casa']['fim'])
              $_SESSION['fim'] = $_POST['Casa']['fim']; */
        }
        if (isset($_GET['Casa'])) {

            $model->attributes = $_GET['Casa'];
            $model->setAttribute($_GET['sType'], 1);
            $model->inicio = $_GET['Casa']['inicio'] = Yii::app()->session['inicio'];
            $model->fim = $_GET['Casa']['fim'] = Yii::app()->session['fim'];

            /* if ($_GET['Casa']['inicio'])
              $_SESSION['inicio'] = $_GET['Casa']['inicio'];
              if ($_GET['Casa']['fim'])
              $_SESSION['fim'] = $_GET['Casa']['fim']; */
        }
        $results = $model->isearchMap()->getData();
        $results = $model->filterByDate($results, date("Y-m-d", strtotime($model->inicio)), date("Y-m-d", strtotime($model->fim)));
        $this->renderPartial('quicksearchbydate', array(
            'model' => $model,
            'results' => $results,
            'inicio' => date("Y-m-d", strtotime($model->inicio)),
            'fim' => date("Y-m-d", strtotime($model->inicio)),
                ), false, true);
    }

    public function actionSearchMap() {

        $this->layout = "";
        $model = new Casa('isearch');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET)) {
            $model->attributes = $_GET;
            $model->setAttribute($_GET['sType'], TRUE);
        }
        if (isset($_POST)) {
            $model->attributes = $_POST;
            $model->setAttribute($_POST['sType'], TRUE);
        }

        $this->renderPartial('quickSearchMap', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? ">= 1" : "=" . Yii::app()->user->id;
        $model = Casa::model()->with('casas', 'precos.reservado')->find('casas.propid' . $uid . ' And t.cod_casa=' . $id);
//$model = Casa::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadClientModel($id) {
        $model = Casa::model()->with('casas')->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'casa-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function behaviors() {
        return array(
            'seo' => array('class' => 'ext.seo.components.SeoControllerBehavior'),
        );
    }

}
