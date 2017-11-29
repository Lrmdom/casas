<?php

/**
 * This is the model class for table "periodo".
 *
 * The followings are the available columns in table 'periodo':
 * @property integer $id
 * @property integer $cod_casa
 * @property string $inicio
 * @property string $fim
 * @property string $preco_semana
 * @property string $preco_dia
 * @property string $preco_fimsemana
 * @property integer $estadia_minima
 *  @property integer $descricao
 */
class Periodo extends CActiveRecord {

    public $descricao;
    public $observacoes;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Periodo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'periodo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('estadia_minima,inicio,fim,preco_semana, preco_dia, preco_fimsemana,observacoes', 'required'),
            array('cod_casa', 'numerical', 'integerOnly' => true),
            array('inicio, fim, preco_semana, preco_dia, preco_fimsemana', 'length', 'max' => 45),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, cod_casa, inicio, fim, preco_semana, preco_dia, preco_fimsemana, estadia_minima,descricao,observacoes', 'safe', 'on' => 'search'),
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
            'cod_casa' => Yii::t('models', 'Casa'),
            'inicio' => Yii::t('models', 'Inicio'),
            'fim' => Yii::t('models', 'Fim'),
            'preco_semana' => Yii::t('models', 'Preco Semana'),
            'preco_dia' => Yii::t('models', 'Preco Dia'),
            'preco_fimsemana' => Yii::t('models', 'Preco dia Fim semana'),
            'estadia_minima' => Yii::t('models', 'Estadia Minima'),
            'descricao' => Yii::t('models', 'Nome'),
            'observacoes' => Yii::t('models', 'Obs'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($cod_casa) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('cod_casa', $cod_casa);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fim', $this->fim, true);
        $criteria->compare('preco_semana', $this->preco_semana, true);
        $criteria->compare('preco_dia', $this->preco_dia, true);
        $criteria->compare('preco_fimsemana', $this->preco_fimsemana, true);
        $criteria->compare('estadia_minima', $this->estadia_minima);
        $criteria->compare('descricao', $this->descricao);
        $criteria->addCondition('date(fim) > "' . date('Y/m/j') . '"');
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function checkDays($model) {
        $myproc2 = "Select id ,inicio,fim,cod_casa from periodo  where cod_casa = " . $model->cod_casa;
        $ocupas = Yii::app()->db->createCommand($myproc2)->query()->readAll();
        foreach ($ocupas as $ocupa) {
            $starte = $ocupa['inicio'];
            $dtEnde = $ocupa['fim'];
            $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($starte)));
            $dtEnd = date('Y/m/j', strtotime("-1 day", strtotime($dtEnde)));
            While (strtotime($dtLoop) <= strtotime($dtEnd)) {
                $inic = date('Y/m/j', strtotime($model->inicio));
                $fim = date('Y/m/j', strtotime($model->fim));
                While (strtotime($inic) <= strtotime($fim)) {
                    if ($inic == $dtLoop) {
                        Yii::app()->user->setFlash('error', $inic . ' Este dia pertence a outro periodo ! periodo ' . $ocupa['id'], true);
                        return TRUE;
                    }
                    $inic = date('Y/m/j', strtotime("+1 day", strtotime($inic)));
                }
                $dtLoop = date('Y/m/j', strtotime("+1 day", strtotime($dtLoop)));
            }
        }
        return FALSE;
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

}
