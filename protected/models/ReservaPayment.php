<?php

/**
 * This is the model class for table "reserva_payments".
 *
 * The followings are the available columns in table 'reserva_payments':
 * @property integer $id
 * @property string $id_pagamento
 * @property string $id_tipo_pagamento
 * @property integer $valor
 * @property integer $idpreco
 * @property integer $idreserva
 */
class ReservaPayment extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ReservaPayments the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'reserva_payment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_pagamento, id_tipo_pagamento, valor, idpreco, idreserva', 'required'),
            array('id, valor, idpreco, idreserva', 'numerical', 'integerOnly' => true),
            array('id_pagamento', 'length', 'max' => 20),
            array('id_tipo_pagamento', 'length', 'max' => 25),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_pagamento, id_tipo_pagamento, valor, idpreco, idreserva', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tipopayments' => array(self::BELONGS_TO, 'TipoPagamento', 'id_tipo_pagamento'),
            'reservas' => array(self::BELONGS_TO, 'Reserva', 'idreserva'),
        );
    }

    public function savePayment($model) {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        $model->id = "";
        $model->save();
        //echo CVarDumper::dumpAsString($model->getErrors());
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_pagamento' => Yii::t('models', 'Numero de Pagamento'),
            'id_tipo_pagamento' => Yii::t('models', 'Tipo Pagamento'),
            'valor' => Yii::t('models', 'Valor'),
            'idpreco' => Yii::t('models', 'Periodo'),
            'idreserva' => Yii::t('models', 'Reserva'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->with = array('tipopayments', 'reservas', 'reservas.preco');
        //$criteria->compare('id', $this->id);
        $criteria->compare('id_pagamento', $this->id_pagamento, true);
        $criteria->compare('id_tipo_pagamento', $this->id_tipo_pagamento, true);
        $criteria->compare('t.valor', $this->valor);
        //$criteria->compare('reservas.idpreco', $idpreco);
        //$criteria->compare('idreserva', $idreserva);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getTotals($id) {
        $reserva = Reserva::model()->findByPk($id);
        $connection = Yii::app()->db;
        $command = $connection->createCommand("SELECT SUM(valor) FROM reserva_payment where idreserva =" . $id);
        $amount = $command->queryScalar();
        $balance = $amount - $reserva->valor;
        $cn = new CNumberFormatter(Yii::app()->getLanguage());
        return $balance;
    }

}
