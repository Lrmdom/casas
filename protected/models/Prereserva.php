<?php

/**
 * This is the model class for table "prereserva".
 *
 * The followings are the available columns in table 'prereserva':
 * @property integer $n_prereserva
 * @property string $data
 * @property string $expira
 * @property integer $id
 * @property integer $cod_casa
 * @property string $nm_mes
 * @property string $n_semana
 * @property string $inicio
 * @property string $fim
 * @property string $preco
 * @property string $quinzena
 * @property string $Nome
 * @property string $morada
 * @property string $email
 * @property string $telefone
 * @property string $perguntas
 * @property string $sugestoes
 * @property string $Comentarios
 * @property string $situacao
 * @property string $forma_pagamento
 * @property string $valor
 * @property string $sessionid
 * @property boolean $voto
*
 * The followings are the available model relations:
 * @property Reserva[] $reservas
 * @property Casa $codCasa
 * @property Preco $id0
 */
class Prereserva extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Prereserva the static model class
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
		return 'prereserva';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, cod_casa', 'numerical', 'integerOnly'=>true),
			array('nm_mes, n_semana, inicio, fim, preco, quinzena, Nome, morada, email, telefone, situacao, forma_pagamento, valor, sessionid', 'length', 'max'=>50),
			array('perguntas, sugestoes, Comentarios', 'length', 'max'=>100),
			array('testaGii', 'length', 'max'=>10),
			array('data, expira, voto', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('n_prereserva, data, expira, id, cod_casa, nm_mes, n_semana, inicio, fim, preco, quinzena, Nome, morada, email, telefone, perguntas, sugestoes, Comentarios, situacao, forma_pagamento, valor, sessionid, voto', 'safe', 'on'=>'search'),
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
			'reservas' => array(self::HAS_MANY, 'Reserva', 'n_prereserva'),
			'codCasa' => array(self::BELONGS_TO, 'Casa', 'cod_casa'),
			'id0' => array(self::BELONGS_TO, 'Preco', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'n_prereserva' => 'N Prereserva',
			'data' => 'Data',
			'expira' => 'Expira',
			'id' => 'ID',
			'cod_casa' => 'Cod Casa',
			'nm_mes' => 'Nm Mes',
			'n_semana' => 'N Semana',
			'inicio' => 'Inicio',
			'fim' => 'Fim',
			'preco' => 'Preco',
			'quinzena' => 'Quinzena',
			'Nome' => 'Nome',
			'morada' => 'Morada',
			'email' => 'Email',
			'telefone' => 'Telefone',
			'perguntas' => 'Perguntas',
			'sugestoes' => 'Sugestoes',
			'Comentarios' => 'Comentarios',
			'situacao' => 'Situacao',
			'forma_pagamento' => 'Forma Pagamento',
			'valor' => 'Valor',
			'sessionid' => 'Sessionid',
			'voto' => 'Voto',
			
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

		$criteria->compare('n_prereserva',$this->n_prereserva);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('expira',$this->expira,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('cod_casa',$this->cod_casa);
		$criteria->compare('nm_mes',$this->nm_mes,true);
		$criteria->compare('n_semana',$this->n_semana,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('fim',$this->fim,true);
		$criteria->compare('preco',$this->preco,true);
		$criteria->compare('quinzena',$this->quinzena,true);
		$criteria->compare('Nome',$this->Nome,true);
		$criteria->compare('morada',$this->morada,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('telefone',$this->telefone,true);
		$criteria->compare('perguntas',$this->perguntas,true);
		$criteria->compare('sugestoes',$this->sugestoes,true);
		$criteria->compare('Comentarios',$this->Comentarios,true);
		$criteria->compare('situacao',$this->situacao,true);
		$criteria->compare('forma_pagamento',$this->forma_pagamento,true);
		$criteria->compare('valor',$this->valor,true);
		$criteria->compare('sessionid',$this->sessionid,true);
		$criteria->compare('voto',$this->voto);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}