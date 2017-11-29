<?php

/**
 * This is the model class for table "reserva".
 *
 * The followings are the available columns in table 'reserva':
 * @property integer $n_prereserva
 * @property string $valorSinal
 * @property string $n_cheque
 * @property string $valor
 * @property boolean $reservado
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property Prereserva $nPrereserva
 * @property Feedbackcoment[] $feedbackcoments
 * @property integer $casa
 *  @property integer $reserva_state
 *  @property string $inicio
 */
class Reserva extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Reserva the static model class
     */
    public $casa;
    public $state;
    public $inicio;
    public $fim;
    public $id_tipo_pagamento;
    public $id_pagamento;
    public $valor;
    public $user;
    public $eventId;

    const PRERESERVA = '1';
    const SINAL = '2';
    const RESERVA = '4';
    const Anulada = '3';

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reserva';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('reserva_state, idcliente,idpreco,valorSinal', 'required'),
            array('reserva_state, idcliente,valorSinal,idpreco,id_tipo_pagamento,id_pagamento,valor', 'required', 'on' => 'reservado'),
            array('n_prereserva', 'numerical', 'integerOnly' => true),
            array('valorSinal, n_pagamento', 'length', 'max' => 50),
            array('valor', 'length', 'max' => 19),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('n_prereserva, valorSinal, n_pagamento, valor, reservado,idcliente,idpreco,casa,reserva_state,fim,inicio,user ', 'safe', 'on' => 'search'),
            array('precos.preco', 'application.extensions.YiiConditionalValidator',
                'validation' => array('in', 'range' => array('1,2,3')),
                'dependentValidations' => array(
                    'reserva_state,idcliente' => array(
                        array('required'),
                    ),
                ),
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'payments' => array(self::HAS_MANY, 'ReservaPayment', 'idreserva'),
            'feedbacks' => array(self::HAS_ONE, 'Feedback', 'reserva'),
            'precos' => array(self::BELONGS_TO, 'Preco', 'idpreco'),
            'preco' => array(self::HAS_ONE, 'Preco', 'id'),
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
            'states' => array(self::BELONGS_TO, 'ReservaState', 'reserva_state'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'n_prereserva' => Yii::t('models', 'Prereserva'),
            'valorSinal' => Yii::t('models', 'Valor Sinal'),
            'n_pagamento' => Yii::t('models', 'Pagamento'),
            'valor' => Yii::t('models', 'Valor'),
            'reservado' => Yii::t('models', 'Reservado'),
            'icliente' => Yii::t('models', 'Cliente'),
            'idpreco' => Yii::t('models', 'Periodo'),
            'reserva_state' => Yii::t('models', 'Estado'),
            'id_tipo_pagamento' => Yii::t('models', 'Meio Pagamento'),
            'id_pagamento' => Yii::t('models', 'Nº Pagamento/Cheque'),
            'valor' => Yii::t('models', 'Valor'),
            'casa' => Yii::t('models', 'Casa'),
        );
    }

    public function archive() {

        $reservas = $this->with("precos")->findAll("inicio <'" . date('Y/m/j') . "'");
        var_dump($reservas);
        foreach ($reservas as $reserva => $value) {
            echo $value->id;
            echo $value->inicio;
        }
        die();
    }

    public function calculatePrice($id, $in, $out) {

        $cn = new CNumberFormatter(Yii::app()->getLanguage());


        $model = $this->findByPk($id);
        $preco = 0;
        $p = new Periodo;
        $periodos = $p->findAll('fim > ' . $in . " and cod_casa=" . $id . " and date(fim) >'" . date('Y/m/j') . "'");
        $arr = array();
        $dtLoop = date('Y/m/j', strtotime($in));
        $dtEnd = date('Y/m/j', strtotime($out));
        $diff = new DateTime($in);
        $diff1 = new DateTime($out);
        $diff2 = $diff->diff($diff1);
        if ($periodos) {
            foreach ($periodos as $p) {
                While (strtotime($dtLoop) <= strtotime($out)) {
                    $inic = date('Y/m/j', strtotime($p->inicio));
                    $fim = date('Y/m/j', strtotime($p->fim));
                    While (strtotime($inic) <= strtotime($fim)) {
                        $wkd = $this->isWeekend($inic);
                        if ($inic == $wkd) {
                            $arr[$inic] = $p->preco_fimsemana;
                        } else {
                            $arr[$inic] = $p->preco_dia;
                        }

                        if ($diff2->days >= 7) {
                            $arr[$inic] = $p->preco_semana / 7;
                        }

                        $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                    }

                    $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
                }

                $dtLoop = date('Y/m/j', strtotime($in));
            }

            While (strtotime($dtLoop) <= strtotime($out)) {
                foreach ($arr as $key) {
                    if (array_key_exists($dtLoop, $arr)) {
                        if ($diff2->days < $p->estadia_minima) {
                            $html = '<div class="alert  alert-warning"><span class="glyphicon glyphicon-warning-sign icon-love"></span> Estadia minima ' . $p->estadia_minima . ' dias</div>';
                            return array("result" => array("html" => $html));

                            Yii::app()->end();
                        }

                        if ($this->checkDaysRaw($id, $in, $out)) {
                            $html = '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign icon-love"></span> Já está reservado</div>';
                            //echo "<script> $('.btreserv1').attr('disabled','disabled');  </script>";
                            return array("result" => array("html" => $html));

                            Yii::app()->end();
                        }

                        $preco = $preco + $arr[$dtLoop];
                        break;
                    } else {
                        $html = '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign icon-love"></span> Não foi possível calcular preço. ' . $dtLoop . ' não tem preço defenido</div>';
                        return array("result" => array("html" => $html));

// echo "<script> $('.btreserv1').attr('disabled','disabled');  </script>";
                        Yii::app()->end();
                    }
                }

                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }

            $html = '<div class="alert alert-info text-center"><span class="glyphicon glyphicon-ok-sign icon-success"></span>  ' . $cn->formatCurrency(round($preco), 'EUR') . '</div>';
            return array("result" => array("preco" => round($preco), "html" => $html));
        } else {
            if ($this->checkDaysRaw($id, $in, $out)) {

                $html = '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign icon-love"></span> Não pode reservar, Já está reservado</div>';
                return array("result" => array("html" => $html));

//echo "<script>$('.btreserv1').attr('disabled','disabled');  </script>";
                Yii::app()->end();
            }

            $html = '<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign icon-love"></span> Não foi possível calcular preço. ' . $in . ' não tem preço defenido</div>';
            return array("result" => array("html" => $html));

//echo "<script> $('.btreserv1').attr('disabled','disabled');</script>";
        }
    }

    public function prereservas() {
        return count($this->with('preco', 'precos.casas', 'states')->findAll('casas.propid=' . Yii::app()->user->id) . ' reserva_state="' . self::PRERESERVA . '"');
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($id) {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $now = new CDbExpression("CURDATE()");

        $criteria = new CDbCriteria;
        $criteria->with = array('precos', 'precos.casas', 'states');
        $criteria->compare('n_prereserva', $this->n_prereserva);
        $criteria->compare('valorSinal', $this->valorSinal, true);
        $criteria->compare('n_pagamento', $this->n_pagamento, true);
        $criteria->compare('valor', $this->valor, true);
//$criteria->compare('precos.promo', 0);
        $criteria->compare('reservado', $this->reservado);
        $criteria->compare('idcliente', $this->idcliente);
        $criteria->compare('idpreco', $id);
        $criteria->addCondition("inicio >= " . $now);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->addCondition("reserva_state=" . Reserva::RESERVA . " or reserva_state=" . Reserva::SINAL);
        $criteria->order = 't.id DESC';
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        //$criteria->compare('casas.propid', Yii::app()->user->id);
        $criteria->compare('casas.propid', $uid);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchArchive() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $now = new CDbExpression("CURDATE()");
        $criteria = new CDbCriteria;
        $criteria->with = array('precos', 'precos.casas', 'states');
        $criteria->compare('n_prereserva', $this->n_prereserva);
        $criteria->compare('valorSinal', $this->valorSinal, true);
        $criteria->compare('n_pagamento', $this->n_pagamento, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('reservado', $this->reservado);
        $criteria->compare('idcliente', $this->idcliente);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->addCondition("fim < " . $now . 'OR reserva_state =' . self::Anulada);

        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        $criteria->compare('casas.propid', $uid);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchNow() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $now = new CDbExpression("CURDATE()");
        $criteria = new CDbCriteria;
        $criteria->with = array('precos', 'precos.casas', 'states');
        $criteria->compare('n_prereserva', $this->n_prereserva);
        $criteria->compare('valorSinal', $this->valorSinal, true);
        $criteria->compare('n_pagamento', $this->n_pagamento, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('reservado', $this->reservado);
        $criteria->compare('idcliente', $this->idcliente);
        $criteria->addCondition("inicio <= " . $now);
        $criteria->addCondition("fim >= " . $now);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->addCondition('reserva_state <>' . self::Anulada);

        $criteria->compare('reserva_state', $this->reserva_state, true);
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        $criteria->compare('casas.propid', $uid);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchFeedback() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('precos', 'precos.casas', 'states', 'feedbacks');
        $criteria->addCondition('NOT EXISTS (SELECT id FROM feedback WHERE feedback.reserva = t.id)');
        $criteria->addCondition('reserva_state = 2 or reserva_state = 4');
        $criteria->addCondition("inicio < '" . date('Y/m/j') . "'");
        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        //$criteria->compare('casas.propid', Yii::app()->user->id);
        $criteria->compare('casas.propid', $uid);
        //$criteria->together = true;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchPrereservas() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('precos', 'precos.casas', 'states', 'cliente');

        $uid = Yii::app()->user->name == (Yii::app()->params['adminEmail']) ? "" : Yii::app()->user->id;
        //$criteria->compare('casas.propid', Yii::app()->user->id);
        $criteria->compare('casas.propid', $uid);
        $criteria->compare('states.state', 'prereserva', true);
        $criteria->order = 't.id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchAll($id) {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('precos');
        $criteria->compare('idpreco', $this->idpreco);
        $criteria->compare('n_prereserva', $this->n_prereserva);
        $criteria->compare('valorSinal', $this->valorSinal, true);
        $criteria->compare('n_pagamento', $this->n_pagamento, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('reservado', $this->reservado);
        $criteria->compare('idcliente', $this->idcliente);
        $criteria->compare('cod_casa', $id);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->compare('state', $this->reserva_state, true);
        $criteria->addCondition('precos.promo IS NULL');
        $criteria->order = 't.id DESC';

//$criteria->with = array('states');
// $criteria->join=' JOIN reserva_state as st ON st.id=t.reserva_state';
// $criteria->join="t.inicio < " .date('Y/m/j') ;
// $criteria->addSearchCondition('precos.fim',$this->fim);
// $criteria->addSearchCondition('precos.inicio',$this->inicio);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchCliente() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('feedbacks', 'precos', 'precos.casas');
        $criteria->compare('idpreco', $this->idpreco);
        $criteria->compare('n_prereserva', $this->n_prereserva);
        $criteria->compare('valorSinal', $this->valorSinal, true);
        $criteria->compare('n_pagamento', $this->n_pagamento, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('reservado', $this->reservado);
        $criteria->compare('idcliente', Yii::app()->user->id);
// $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->compare('state', $this->reserva_state, true);
        $criteria->order = 't.id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function searchClienteReservaFeedback($cod_casa) {
// Warning: Please modify the following code to remove attributes that
// should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('feedbacks', 'precos');

        $criteria->compare('idcliente', Yii::app()->user->id);
        $criteria->compare('precos.cod_casa', $cod_casa);
        $criteria->addCondition('precos.inicio < "' . date('Y/m/j') . '"');
        //$criteria->addCondition('NOT EXISTS (SELECT id FROM feedback WHERE feedback.reserva = ' . $cod_casa . ')');
        $criteria->addCondition('reserva_state = ' . Reserva::SINAL . " OR " . 'reserva_state = ' . Reserva::RESERVA);
        $criteria->addCondition('feedbacks.id IS NULL');
        $criteria->order = 't.id DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'fim' => array(
                        'asc' => 'precos.fim',
                        'desc' => 'precos.fim DESC',
                    ),
                    'inicio' => array(
                        'asc' => 'precos.inicio',
                        'desc' => 'precos.inicio DESC',
                    ),
                    '*',
                ),
            ),
        ));
    }

    public function checkDays($model, $state) {
        $now = new CDbExpression("CURDATE()");

        $myproc2 = "Select preco.id as idpreco,inicio,fim,cod_casa,reserva.id from preco left join reserva on preco.id=reserva.idpreco where idpreco <> $model->idpreco and cod_casa = " . $model->precos->cod_casa . " AND livre = 0 and fim > " . $now . " and (reserva_state = " . Reserva::RESERVA . " OR reserva_state = " . Reserva::SINAL . ") order by idpreco desc";
        $ocupas = Yii::app()->db->createCommand($myproc2)->query()->readAll();
        foreach ($ocupas as $ocupa) {
            $starte = $ocupa['inicio'];
            $dtEnde = $ocupa['fim'];
            $dtLoop = date('Y/m/j ', strtotime("+1 day", strtotime($starte)));
            $dtEnd = date(' Y/m/j ', strtotime("-1 day", strtotime($dtEnde)));
            $precoid = $ocupa[' idpreco'];
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                $inic = date('Y/m/j ', strtotime($model->precos->inicio));
                $fim = date('Y/m/j ', strtotime($model->precos->fim));
                While (strtotime($inic) <= strtotime($fim)) {
                    if ($inic == $dtLoop && $precoid != $model->idpreco && ($state == self::SINAL || $state == self::RESERVA)) {
                        Yii::app()->user->setFlash('error ', $inic . ' Este dia ja esta reservado!Reserva ' . $ocupa['id '], true);
                        return TRUE;
                    }
                    $inic = date('Y/m/j ', strtotime("+1 day", strtotime($inic)));
                }
                $dtLoop = date(' Y/m/j ', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        return FALSE;
    }

    public function checkDaysRaw($cod_casa, $inicio, $fim) {
        $now = new CDbExpression("CURDATE()");

        $myproc2 = "Select preco.id as idpreco,inicio,fim,cod_casa,reserva.id from preco left join reserva on preco.id=reserva.idpreco where cod_casa = " . $cod_casa . " AND livre = 0 and fim > " . $now . " and (reserva_state = " . Reserva::RESERVA . " OR reserva_state = " . Reserva::SINAL . ") order by idpreco desc";
        $ocupas = Yii::app()->db->createCommand($myproc2)->query()->readAll();
        foreach ($ocupas as $ocupa) {
            $starte = $ocupa['inicio'];
            $dtEnde = $ocupa['fim'];
            $dtLoop = date('Y/m/j ', strtotime("+1 day", strtotime($starte)));
            $dtEnd = date(' Y/m/j ', strtotime("-1 day", strtotime($dtEnde)));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                $inic = date(' Y/m/j ', strtotime($inicio));
                $fim = date('Y/m/j ', strtotime($fim));
                While (strtotime($inic) <= strtotime($fim)) {
                    if ($inic == $dtLoop) {
                        Yii::app()->user->setFlash('error ', $inic . ' Este dia ja esta reservado!Reserva ' . $ocupa['id '], true);
                        return TRUE;
                    }
                    $inic = date('Y/m/j ', strtotime("+1 day", strtotime($inic)));
                }
                $dtLoop = date(' Y/m/j ', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        return FALSE;
    }

    public function sendMails($idreserva, $action) {
        Yii::import('application.controllers.ReservaController');
        Yii::import('application.controllers.CasaController');
        $reservaCtl = new ReservaController(12);
        $Reservaemail = $reservaCtl->loadModelEmail($idreserva);
        Yii::app()->user->setFlash('success', ' Ok com Reserva! ', true);
        $mailer = Yii::createComponent('application.extensions.EMailer');
        $mailerProp = Yii::createComponent('application.extensions.EMailer');
        if ($action === 'update') {
            $mailer->getView('emailUpdateReserva', array('model' => $Reservaemail), NULL);
            $mailerProp->getView('emailUpdateReservaProp', array('model' => $Reservaemail), NULL);
            $mailerProp->Subject = Yii::t('demo', 'O seu imóvel tem uma actualização de reserva!');
            $mailer->Subject = Yii::t('demo', 'A sua reserva foi actualizada!');
        } else {
            $mailerProp->getView('emailConfirmaReservaProp', array('model' => $Reservaemail), NULL);
            $mailer->getView('emailConfirmaReserva', array('model' => $Reservaemail), NULL);
            $mailerProp->Subject = Yii::t('demo', 'O seu imóvel foi reservado!');
            $mailer->Subject = Yii::t('demo', 'Obrigado pela sua Reserva!');
        }
        $mailer->From = Yii::app()->params["noReplyEmail"];
        $mailer->AddAddress($Reservaemail->cliente->email);
        $mailer->FromName = Yii::app()->name;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->Send();
        $mailer->AddAddress(Yii::app()->params['adminEmail']);
        $mailer->Send();
        $mailerProp->From = 'webmaster@casasdapraia.pt';
        $mailerProp->AddAddress($Reservaemail->precos->casas->casasprop->email);
        $mailerProp->FromName = 'Casas da Praia';
        $mailerProp->CharSet = 'UTF-8';
        $mailerProp->IsHTML(true);
        $mailerProp->Send();
        return;
    }

    public function sendMailsOutated($idreserva) {
        Yii::import('application.controllers.ReservaController');
        Yii::import('application.controllers.CasaController');
        $reservaCtl = new ReservaController(12);
        $Reservaemail = $reservaCtl->loadModelEmail($idreserva);
        Yii::app()->user->setFlash('success', 'Ok com Reserva!', true);
        $mailer = Yii::createComponent('application.extensions.EMailer');
        $mailer->getView('emailsuplantadaReserva', array('model' => $Reservaemail), NULL);
        $mailer->Subject = Yii::t('demo', 'A sua reserva foi suplantada!');
        $mailer->From = Yii::app()->params["noReplyEmail"];
        $mailer->AddAddress($Reservaemail->cliente->email);
        $mailer->FromName = Yii::app()->name;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);
        $mailer->Send();
    }

    function isWeekend($date) {
//return (date('w', strtotime($date)) >= 6);
//$weekday = date("w", strtotime("2012-01-01"));
        if (date('N', strtotime($date)) >= 6) {
            return $date;
        }
    }

    public function checkOutdated($id) {
        $datess = new Reserva;
        $dates = $datess->with('precos')->findByPk($id);
        if ($dates) {
            $pr = "Select preco.id,inicio,fim,promo,cod_casa,reserva.id from preco left join reserva on preco.id=reserva.idpreco where cod_casa = " . $dates->precos->cod_casa . "  and fim > " . date('Y/m/j') . " and reserva.id <> $id" . " and reserva_state = " . Reserva::PRERESERVA;
            $prereservas = Yii::app()->db->createCommand($pr)->query()->readAll();
            if ($prereservas) {
                foreach ($prereservas as $prereserva) {
                    $starte = $dates->precos->inicio;
                    $dtEnde = $dates->precos->fim;
                    $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($starte)));
                    $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($dtEnde)));
                    While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                        $inic = date('Y/m/j', strtotime($prereserva['inicio']));
                        $fim = date('Y/m/j', strtotime($prereserva['fim']));
                        While (strtotime($inic) <= strtotime($fim)) {
                            if ($inic == $dtLoop && $id != $prereserva['id']) {
                                $datess->updateByPk($prereserva['id'], array('reserva_state' => Reserva::Anulada), "id=" . $prereserva['id']);
                                $this->sendMailsOutated($prereserva['id']);
                                break 2;
                            }
                            $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                        }
                        $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
                    }
                }
            }
        }
        return;
    }

}
