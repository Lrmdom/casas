<?php

/**
 * This is the model class for table "alert".
 *
 * The followings are the available columns in table 'alert':
 * @property integer $id
 * @property integer $id_cliente
 * @property integer $id_tipo_alojamento
 * @property integer $id_tipo
 * @property integer $valor
 * @property integer $pessoas
 * @property integer $destino
 * @property integer $for_rent
 * @property integer $for_sale
 * @property integer $for_arrenda
 */
class Alert extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Alert the static model class
     */
    public $valor_rent;
    public $valor_arrenda;
    public $valor_venda;
    public $inicio;
    public $fim;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'alert';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('for_rent,for_sale,for_arrenda', 'validateCheckboxs', 'message' => 'Pelo menos um tipo de negócio tem que estar selecionado'),
            array('valor_arrenda', 'validateValor'),
            array('inicio,fim,valor_rent', 'validateValor2'),
            array('valor_venda', 'validateValorVenda'),
            array('id_cliente, id_tipo_alojamento, id_tipo,  pessoas, destino', 'required'),
            array('id_cliente,  valor, pessoas, for_rent, for_sale, for_arrenda', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_cliente, id_tipo_alojamento, id_tipo, valor, pessoas, destino, for_rent, for_sale, for_arrenda', 'safe', 'on' => 'search'),
        );
    }

    public function validateValor($attribute, $params) {
        if ($this->for_arrenda) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateValor2($attribute, $params) {
        if ($this->for_rent) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateValorVenda($attribute, $params) {
        if ($this->for_sale) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    public function validateCheckboxs($attribute, $params) {
        if (!$this->for_arrenda && !$this->for_rent && !$this->for_sale) {
            $ev = CValidator::createValidator('required', $this, $attribute, $params);
            $ev->validate($this);
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'id_cliente'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_cliente' => Yii::t('models', 'Cliente'),
            'id_tipo_alojamento' => Yii::t('models', 'Tipo Alojamento'),
            'id_tipo' => Yii::t('models', 'Tipo'),
            'valor' => Yii::t('models', 'Valor'),
            'pessoas' => Yii::t('models', 'Pessoas'),
            'destino' => Yii::t('models', 'Destino'),
            'for_rent' => Yii::t('models', 'Férias'),
            'for_sale' => Yii::t('models', 'Venda'),
            'for_arrenda' => Yii::t('models', 'Arrenda'),
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
        $criteria->compare('id_cliente', Yii::app()->user->id);
        $criteria->compare('id_tipo_alojamento', $this->id_tipo_alojamento);
        $criteria->compare('id_tipo', $this->id_tipo);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('pessoas', $this->pessoas);
        $criteria->compare('destino', $this->destino);
        $criteria->compare('for_rent', $this->for_rent);
        $criteria->compare('for_sale', $this->for_sale);
        $criteria->compare('for_arrenda', $this->for_arrenda);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function comandos() {

        $reader = Alert::model()->with('cliente')->findAll();
        $casas = Casa::model()->findAll("activo=1");
        $reserva = new Reserva;
        $casasAlertSale = array();
        $casasAlertRent = array();
        $casasAlertHoliday = array();
        foreach ($reader as $alerta) {

            if ($alerta->for_sale == 1) {
                foreach ($casas as $casa) {
                    if ($alerta->id_tipo_alojamento == $casa->tipoalojamento && $alerta->id_tipo == $casa->tipo && $alerta->valor_venda <= $casa->valor_venda && $casa->for_sale == 1) {
                        array_push($casasAlertSale, $casa);
                    }
                }
            }
            if ($alerta->for_rent == 1) {
                foreach ($casas as $casa) {
                    if ($alerta->id_tipo_alojamento == $casa->tipoalojamento && $alerta->id_tipo == $casa->tipo && $alerta->pessoas <= $casa->pessoas && $casa->for_rent == 1) {
                        $value = $reserva->calculatePrice($casa->cod_casa, $alerta->inicio, $alerta->fim);
                        if ($alerta->valor_rent >= $value["result"]["preco"])
                            array_push($casasAlertHoliday, $casa);
                    }
                }
            }
            if ($alerta->for_arrenda == 1) {
                foreach ($casas as $casa) {
                    if ($alerta->id_tipo_alojamento == $casa->tipoalojamento && $alerta->id_tipo == $casa->tipo && $casa->valor_arrendamento <= $alerta->valor_arrenda && $casa->for_arrenda == 1) {
                        array_push($casasAlertRent, $casa);
                    }
                }
            }
            if (isset($alerta->cliente->email)) {

                $this->sendAlertMail($casasAlertSale, $casasAlertHoliday, $casasAlertRent, $alerta->cliente);
            }
        }
    }

    public function sendAlertMail($casasSale, $casasHoliday, $casasRent, $client) {


        $mailer = Yii::createComponent('application.extensions.EMailerConsole');
        $mailer->From = Yii::app()->params["noReplyEmail"];
        //$mailer->From = "webmaster@casasdapraia.pt";
        $mailer->AddAddress($client->email);
        $mailer->FromName = Yii::app()->params["domain"];
        ;
        $mailer->CharSet = 'UTF-8';
        $mailer->IsHTML(true);

        $mailer->getView('alertsCron', array('casasSale' => $casasSale, "casasHoliday" => $casasHoliday, "casasRent" => $casasRent, "client" => $client), NULL);
        $mailer->Subject = Yii::t('demo', 'Casas do seu alerta');
        $mailer->Send();
    }

}
