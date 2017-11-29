<?php

/**
 * This is the model class for table "feedback".
 *
 * The followings are the available columns in table 'feedback':
 * @property integer $id
 * @property integer $cod_casa
 * @property integer $valor_voto
 * @property string $comment
 * @property integer $id_cliente
 * @property integer $reserva
 * @property integer $aproved
 * @property integer $revisto


 */
class Feedback extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Feedback the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'feedback';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(' cod_casa, valor_voto, comment, id_cliente,reserva', 'required'),
            array(' cod_casa, valor_voto, id_cliente, reserva', 'numerical', 'integerOnly' => true),
            array('comment', 'length', 'max' => 500),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cod_casa, valor_voto, comment, id_cliente, reserva', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'clientes' => array(self::BELONGS_TO, 'Cliente', 'id_cliente'),
            'casas' => array(self::BELONGS_TO, 'Casa', 'cod_casa'),
            'reservas' => array(self::BELONGS_TO, 'Reserva', 'reserva'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cod_casa' => Yii::t('models', 'Casa'),
            'valor_voto' => Yii::t('models', 'Valor Voto'),
            'comment' => Yii::t('models', 'Comentário'),
            'id_cliente' => Yii::t('models', 'Cliente'),
            'reserva' => Yii::t('models', 'Reserva'),
            'revisto' => Yii::t('models', 'Revisto'),
            'aproved' => Yii::t('models', 'Aprovado')
        );
    }

    public function revised() {
        $fdkcount = $this->with('casas')->findAll('aproved=0 AND casas.propid=' . Yii::app()->user->id);
        return count($fdkcount);
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($cod_casa) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('clientes');
        $criteria->compare('id', $this->id);
        $criteria->compare('cod_casa', $cod_casa);
        $criteria->compare('valor_voto', $this->valor_voto);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('id_cliente', $this->id_cliente);
        $criteria->compare('reserva', $this->reserva);
        $criteria->compare('revisto', $this->revisto);
        $criteria->compare('aproved', $this->aproved);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchCliente() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('clientes');


        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('id_cliente', Yii::app()->user->id);
        $criteria->compare('reserva', $this->reserva);
        $criteria->compare('revisto', $this->revisto);
        $criteria->compare('aproved', $this->aproved);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchCheck() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $criteria = new CDbCriteria;
        $criteria->with = array('clientes', "casas");
        $criteria->compare('id', $this->id);
        $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->compare('valor_voto', $this->valor_voto);
        $criteria->compare('comment', $this->comment, true);
        $criteria->compare('id_cliente', $this->id_cliente);
        $criteria->compare('reserva', $this->reserva);
        $criteria->compare('aproved', 0);
        $criteria->compare("casas.propid", Yii::app()->user->id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function GetFeedbackAvg($cod_casa) {
        $avg = Yii::app()->db->createCommand("SELECT  SUM(valor_voto)/ COUNT(DISTINCT id) as avg FROM feedback where cod_casa=$cod_casa")->queryScalar();

        return round($avg);
    }

    public function CheckFeedback($reserva) {
        $feedbackExist = $this->exists('reserva=' . $reserva . " AND id_cliente=" . Yii::app()->user->id);
        if ($feedbackExist) {
            Yii::app()->user->setFlash('error', 'Erro com  Feedback ,  Já atribuiu feedback!', true);
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function CheckReserva($reserva) {
        $reserva = new Reserva();
        $result = $reserva->with('precos')->find('id=' . $reserva . " AND idcliente=" . Yii::app()->user->id);
        if (!$result) {
            Yii::app()->user->setFlash('error', 'Erro com  Feedback , Não existe reserva desta casa associada ao seu nº de cliente!', true);
            return;
        }
        return $result;
    }

}
