<?php

/**
 * This is the model class for table "semana".
 *
 * The followings are the available columns in table 'semana':
 * @property integer $ano
 * @property string $nm_mes
 * @property integer $n_semana
 * @property string $descricao_semana
 * @property string $inicio
 * @property string $fim
 */
class Semana extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Semana the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'semana';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ano, n_semana', 'numerical', 'integerOnly'=>true),
			array('nm_mes, descricao_semana, inicio, fim', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ano, nm_mes, n_semana, descricao_semana, inicio, fim', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ano' => 'Ano',
			'nm_mes' => 'Nm Mes',
			'n_semana' => 'N Semana',
			'descricao_semana' => 'Descricao Semana',
			'inicio' => 'Inicio',
			'fim' => 'Fim',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ano',$this->ano);
		$criteria->compare('nm_mes',$this->nm_mes,true);
		$criteria->compare('n_semana',$this->n_semana);
		$criteria->compare('descricao_semana',$this->descricao_semana,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('fim',$this->fim,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}