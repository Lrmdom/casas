<?php

/**
 * This is the model class for table "mylist".
 *
 * The followings are the available columns in table 'mylist':
 * @property integer $id
 * @property integer $cod_casa
 * @property string $sessid
 * @property string $cliente
 * @property string $data
 */
class Compare extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Mylist the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'compare';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, cod_casa', 'numerical', 'integerOnly' => true),
            array('sessid, cliente', 'length', 'max' => 50),
            array('data', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cod_casa, sessid, cliente, data', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'casas' => array(self::BELONGS_TO, 'Cliente', 'cliente'),
            'casa' => array(self::BELONGS_TO, 'Casa', 'cod_casa'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cod_casa' => Yii::t('models', 'Casa'),
            'sessid' => 'Sessid',
            'cliente' => Yii::t('models', 'Cliente'),
            'data' => Yii::t('models', 'Data'),
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
        $criteria->with = array('casa');
        $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->compare('data', $this->data, true);
        if (Yii::app()->user->isGuest) {
            $criteria->compare('t.sessid', Yii::app()->session->getSessionID());
        } else {
            $criteria->compare('t.cliente', Yii::app()->user->id);
        }
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
