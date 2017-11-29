<?php

/**
 * This is the model class for table "periodo_longo".
 *
 * The followings are the available columns in table 'periodo_longo':
 * @property integer $id
 * @property integer $cod_casa
 * @property string $inicio
 * @property string $fim
 * @property integer $preco_mes
 * @property integer $estadia_minima
 *
 * The followings are the available model relations:
 * @property Casa $codCasa
 */
class PeriodoLongo extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PeriodoLongo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'periodo_longo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cod_casa, inicio, fim, preco_mes, estadia_minima', 'required'),
            array('cod_casa, preco_mes', 'numerical', 'integerOnly' => true),
            array('inicio, fim', 'length', 'max' => 12),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cod_casa, inicio, fim, preco_mes, estadia_minima', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'codCasa' => array(self::BELONGS_TO, 'Casa', 'cod_casa'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'cod_casa' => 'Cod Casa',
            'inicio' => Yii::t('models', 'Inicio'),
            'fim' => Yii::t('models', 'Fim'),
            'preco_mes' => Yii::t('models', 'Preco Mes'),
            'estadia_minima' => Yii::t('models', 'Estadia Minima'),
        );
    }

    public function updateDates() {

        $dates = $this->findAll();

        foreach ($dates as $value) {

            if ($value->inicio < date('Y/m/j')) {
                while ($value->inicio < date('Y/m/j')) {
                    $value->inicio = date('Y/m/j', strtotime('+1 year', strtotime($value->inicio)));
                    $value->fim = date('Y/m/j', strtotime('+1 year', strtotime($value->fim)));
                }
                echo ($value->inicio) . "<br>" . ($value->fim) . "<br>" . date('Y/m/j');
                $value->update();
            }
        }
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($cod_casa) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('cod_casa', $cod_casa);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function checkDates($inicio, $fim, $casa) {
        $periodos = $this->findAll("cod_casa = " . $casa);

        foreach ($periodos as $periodo) {
            $start = $periodo['inicio'];
            $dtEnd = $periodo['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($priodo['inicio'])));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($periodo['fim'])));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {

                $inic = date('Y/m/j', strtotime($inicio));
                $fim = date('Y/m/j', strtotime($fim));
                While (strtotime($inic) <= strtotime($fim)) {
                    if ($inic == $dtLoop) {
                        Yii::app()->user->setFlash('error', $dtLoop . Yii::t("content", " pertence a outro período"), true);
                        return TRUE;
                    }
                    $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                }


                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }

        return FALSE;
    }

}
