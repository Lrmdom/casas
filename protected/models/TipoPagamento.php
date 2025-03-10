<?php

/**
 * This is the model class for table "tipo_pagamento".
 *
 * The followings are the available columns in table 'tipo_pagamento':
 * @property integer $id
 * @property string $tipo_pagamento
 */
class TipoPagamento extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TipoPagamento the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tipo_pagamento';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_pagamento', 'required'),
            array('tipo_pagamento', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, tipo_pagamento', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'payments' => array(self::HAS_MANY, 'ReservaPayment', 'id_tipo_pagamento')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tipo_pagamento' => Yii::t('models', 'Tipo Pagamento'),
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

        $criteria->compare('id', $this->id);
        $criteria->compare('tipo_pagamento', $this->tipo_pagamento, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
