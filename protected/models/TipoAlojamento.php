<?php

/**
 * This is the model class for table "tipo_alojamento".
 *
 * The followings are the available columns in table 'tipo_alojamento':
 * @property integer $id_tipo_alojamento
 * @property string $tipo_alojamento
 */
class TipoAlojamento extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TipoAlojamento the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tipo_alojamento';
    }

    public function getNameLocalized() {
        return Yii::t(strtolower(__CLASS__), $this->tipo_alojamento);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_alojamento', 'required'),
            array('tipo_alojamento', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_tipo_alojamento, tipo_alojamento', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_tipo_alojamento' => 'Id Tipo Alojamento',
            'tipo_alojamento' => Yii::t('models', 'Tipo Alojamento'),
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

        $criteria->compare('id_tipo_alojamento', $this->id_tipo_alojamento);
        $criteria->compare('tipo_alojamento', $this->tipo_alojamento, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
