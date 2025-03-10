<?php

/**
 * This is the model class for table "visita".
 *
 * The followings are the available columns in table 'visita':
 * @property integer $id
 * @property integer $cliente
 * @property integer $cod_casa
 * @property string $data
 * @property string $hora
 */
class Visita extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Visita the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'visita';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cliente, cod_casa, data, hora', 'required'),
            array('cliente, cod_casa', 'numerical', 'integerOnly' => true),
            array('data', 'length', 'max' => 12),
            array('hora', 'length', 'max' => 10),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cliente, cod_casa, data, hora', 'safe', 'on' => 'search'),
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
            'id' => 'ID',
            'cliente' => Yii::t('models', 'Cliente'),
            'cod_casa' => Yii::t('models', 'Casa'),
            'data' => Yii::t('models', 'Data'),
            'hora' => Yii::t('models', 'Hora'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.
        $now = new CDbExpression("CURDATE()");

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('cliente', Yii::app()->user->id);
        $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->addCondition('data > ' . $now);
        $criteria->compare('hora', $this->hora);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
