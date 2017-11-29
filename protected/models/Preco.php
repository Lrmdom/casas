<?php

/**
 * This is the model class for table "preco".
 *
 * The followings are the available columns in table 'preco':
 * @property integer $id
 * @property integer $ano
 * @property string $nm_mes
 * @property integer $n_semana
 * @property integer $cod_casa
 * @property string $inicio
 * @property string $fim
 * @property integer $preco
 * @property boolean $livre
 * @property string $reservar
 * @property boolean $promo
 * @property boolean $paga
 *
 * The followings are the available model relations:
 * @property Prereserva[] $prereservas
 * @property Casa $codCasa
 *
 */
class Preco extends CActiveRecord {

    public $defaccao;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Preco the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'preco';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cod_casa,preco,inicio, fim', 'required', 'on' => 'client'),
            array('cod_casa,preco,inicio, fim,defaccao', 'required', 'on' => 'create'),
            array('ano, n_semana, cod_casa, preco', 'numerical', 'integerOnly' => true),
            array('nm_mes, inicio, fim, reservar', 'length', 'max' => 50),
            array('livre, promo, paga,defaccao', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, ano, nm_mes, n_semana, cod_casa, inicio, fim, preco, livre, reservar, promo, paga,defaccao', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reservas' => array(self::HAS_MANY, 'Reserva', 'idpreco'),
            'prereservas' => array(self::HAS_MANY, 'Prereserva', 'idpreco'),
            'casas' => array(self::BELONGS_TO, 'Casa', 'cod_casa'),
            'casasprop' => array(Casa::BELONGS_TO, 'Proprietario', 'propid'),
            'reservado' => array(self::HAS_ONE, 'Reserva', 'idpreco'),
            'reserva' => array(self::HAS_ONE, 'Reserva', 'id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ano' => 'Ano',
            'nm_mes' => 'Nm Mes',
            'n_semana' => 'N Semana',
            'cod_casa' => Yii::t('models', 'Casa'),
            'inicio' => Yii::t('models', 'Inicio'),
            'fim' => Yii::t('models', 'Fim'),
            'preco' => Yii::t('models', 'Preco'),
            'livre' => Yii::t('models', 'Livre'),
            'reservar' => Yii::t('models', 'Reservar'),
            'promo' => Yii::t('models', 'Promoção'),
            'paga' => 'Paga',
            'defaccao' => Yii::t('models', 'Escolha uma opçao'),
        );
    }

    public function deletePromos() {

        $this->deleteAll("inicio <'" . date('Y/m/j') . "' AND promo = 1");
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">= 1" : "=" . Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->select = "id,casa.cod_casa,inicio,preco,fim,reserva.idcliente  ";
        $criteria->alias = "periodo";
        $criteria->join = "INNER JOIN  reserva on reserva.idpreco=periodo.id";
        $criteria->join = "INNER JOIN  casa on casa.cod_casa=periodo.cod_casa";
        $criteria->join .= " INNER JOIN proprietario ON casa.propid = proprietario.propid";
        //  $criteria->condition = "casa.propid".$uid ;
        $criteria->condition = "casa.propid" . $uid . " and casa.cod_casa=" . Yii::app()->request->getQuery('cod_casa');
        $dataprov = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        return $dataprov;
    }

    public function isearch($cod_casa) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;
        $criteria = new CDbCriteria;
        //$criteria->compare('cod_casa', $this->cod_casa);
        $criteria->addCondition('fim > "' . date('Y/m/j') . '"');
        $criteria->addCondition('t.promo  = 1');
        $criteria->addCondition('t.livre  = 1');
        $criteria->addCondition('casas.cod_casa=' . $cod_casa);
        $criteria->with = array('casas');
        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        return $test;
    }

    public function searchPromo() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $uid = Yii::app()->user->name == Yii::app()->params["adminEmail"] ? ">=1" : "=" . Yii::app()->user->id;
        $criteria = new CDbCriteria;
        $criteria->compare('t.cod_casa', $this->cod_casa);
        $criteria->compare('preco', $this->preco);
        $criteria->addCondition('t.promo  = 1');
        $criteria->addCondition('t.livre  = 1');
        //$criteria->addCondition('casas.cod_casa=' . $cod_casa);
        $criteria->addCondition('casas.propid' . $uid);
        $criteria->with = array('casas');
        $test = new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
        return $test;
    }

    public function verifyReserva($id) {
        $model = Reserva::model()->exists('idpreco=' . $id . " and (reserva_state = " . Reserva::RESERVA . ")");
        if ($model === true) {
            $dates = Preco::model()->find('id =' . $id);
            Yii::app()->user->setFlash('error', $dates->inicio . ' a ' . $dates->fim . ' Tem reservas!', true);
        }
        return $model;
    }

    public function verifyPrereserva($id) {
        $model = Prereserva::model()->exists('preco=' . $id);
        if ($model != null)
            Yii::app()->user->setFlash('error', 'Tem Prereservas!', true);
        return $model;
    }

}
