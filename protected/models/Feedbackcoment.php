<?php

/**
 * This is the model class for table "feedbackcoment".
 *
 * The followings are the available columns in table 'feedbackcoment':
 * @property integer $id
 * @property integer $cod_casa
 * @property string $coment
 * @property integer $valor_voto
 * @property integer $reserva
 * @property string $nome
 *
 * The followings are the available model relations:
 * @property Reserva $reserva0
 */
class Feedbackcoment extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Feedbackcoment the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'feedbackcoment';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id, cod_casa, valor_voto, reserva', 'numerical', 'integerOnly' => true),
            array('coment, nome', 'length', 'max' => 50),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cod_casa, coment, valor_voto, reserva, nome', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reserva0' => array(self::BELONGS_TO, 'Reserva', 'reserva'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cod_casa' => 'Cod Casa',
            'coment' => Yii::t('models', 'Comentario'),
            'valor_voto' => Yii::t('models', 'Valor Voto'),
            'reserva' => Yii::t('models', 'Reserva'),
            'nome' => Yii::t('models', 'Nome'),
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
        $criteria->compare('cod_casa', $this->cod_casa);
        $criteria->compare('coment', $this->coment, true);
        $criteria->compare('valor_voto', $this->valor_voto);
        $criteria->compare('reserva', $this->reserva);
        $criteria->compare('nome', $this->nome, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
