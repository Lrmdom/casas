<?php

/**
 * This is the model class for table "Cliente".
 *
 * The followings are the available columns in table 'Cliente':
 * @property integer $clienteid
 * @property string $cliente
 * @property string $senha
 * @property string $senha_repeat
 * @property string $salt
 * @property string $telefone
 * @property string $email
 * @property string $morada
 * @property string $cod_postal
 * @property string $localidade
 * @property string $conflito1
 * @property string $conflito2
 * @property string $conflito3
 * @property string $sessid
 * @property integer $activo
 * @property string $pais
 * @property integer $subscribe_newsletter
 */
class Cliente extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Cliente the static model class
     */
    public $fb_id;
    public $verifyCode;
    public $facebook_account;

    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cliente';
    }

    public function getNameSurname() {
        return $this->clienteid . '    -    ' . $this->cliente . '    -    ' . $this->email;
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('cliente, senha, senha_repeat, telefone, email, morada, cod_postal, localidade, pais,verifyCode', 'required'),
            array('email ', 'required', 'on' => 'fb'),
            array('activo, subscribe_newsletter', 'numerical', 'integerOnly' => true),
            array('cliente', 'length', 'max' => 50),
            array('email', 'email'),
            array('senha, senha_repeat, salt, telefone, email, cod_postal, localidade, sessid, pais', 'length', 'max' => 45),
            array('morada, conflito1, conflito2, conflito3', 'length', 'max' => 255),
            array('email, cliente', 'unique', 'message' => ("This user's name already exists.")),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('fb_id,clienteid, cliente, senha, senha_repeat, salt, telefone, email, morada, cod_postal, localidade, conflito1, conflito2, conflito3, sessid, activo, pais, subscribe_newsletter', 'safe', 'on' => 'search'),
            array('senha_repeat', 'compare', 'compareAttribute' => 'senha'),
            array('captcha', // Must be _after_ required rule
                'captcha',
                'on' => '_form',
                'captchaAction' => 'cliente/captcha',
                'skipOnError' => true, // Important: Only validate captcha if 'required' had no error (a.k.a. "if not empty")
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'reservas' => array(self::HAS_MANY, 'Reserva', 'idcliente'),
            'alertas' => array(self::HAS_MANY, 'Alert', 'id_cliente'),
            'feedbacks' => array(self::HAS_MANY, 'Feedback', 'id_cliente'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'clienteid' => 'id Cliente',
            'cliente' => Yii::t('models', 'Cliente'),
            'senha' => Yii::t('models', 'Senha'),
            'senha_repeat' => Yii::t('models', 'Repita a senha'),
            'salt' => 'Salt',
            'telefone' => Yii::t('models', 'Telefone'),
            'email' => Yii::t('models', 'Email'),
            'morada' => Yii::t('models', 'Morada'),
            'cod_postal' => Yii::t('models', 'Codigo Postal'),
            'localidade' => Yii::t('models', 'Localidade'),
            'conflito1' => 'Conflito1',
            'conflito2' => 'Conflito2',
            'conflito3' => 'Conflito3',
            'sessid' => 'Sessid',
            'activo' => Yii::t('models', 'Activo'),
            'pais' => Yii::t('models', 'Pais'),
            'fb_id' => Yii::t('models', 'FbId'),
            'subscribe_newsletter' => Yii::t('models', 'Subscrever Newsletter'),
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
        $criteria->compare('clienteid', $this->clienteid);
        $criteria->compare('cliente', $this->cliente, true);
        $criteria->compare('senha', $this->senha, true);
        $criteria->compare('senha_repeat', $this->senha_repeat, true);
        $criteria->compare('salt', $this->salt, true);
        $criteria->compare('telefone', $this->telefone, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('morada', $this->morada, true);
        $criteria->compare('cod_postal', $this->cod_postal, true);
        $criteria->compare('localidade', $this->localidade, true);
        $criteria->compare('conflito1', $this->conflito1, true);
        $criteria->compare('conflito2', $this->conflito2, true);
        $criteria->compare('conflito3', $this->conflito3, true);
        $criteria->compare('sessid', $this->sessid, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('pais', $this->pais, true);
        $criteria->compare('subscribe_newsletter', $this->subscribe_newsletter);
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    protected function afterValidate() {
        parent::afterValidate();
        $this->senha = $this->encrypt($this->senha);
    }

    public function encrypt($value) {
        return base64_encode($value);
    }

    public function decrypt($value) {
        return base64_decode($value);
    }

    public static function prepareUserForAuthorisation($username) {
        if (strpos($username, "@")) {
            $user = self::model()->find('LOWER(email)=?', array($username));
        } else {
            $user = self::model()->find('LOWER(cliente)=?', array($username));
        }
        if ($user instanceof Cliente) {
            return $user;
        }
        return NULL;
    }

    public static function createRandomUsername($lenght = 10) {
        $chars = "QWERTZUIOPASDFGHJKLYXCVBNMasdfghjklqwertzuiopyxcvbnm1234567890";
        $shuffle = str_split($chars);
        shuffle($shuffle);
        $string = implode("", $shuffle);
        return substr($string, 0, $lenght) . time();
    }

    /**
     * Validate pasword
     * If is facebook user dont validate password
     * @param type $password
     * @return boolean
     */
    public function validatePassword($password) {
        if ($this->facebook_account == 1) {
            return true;
        }
        // return $this->senha == self::hash($password);
        return $this->senha;
    }

    /**
     * Hash password
     * @param type $password
     * @return type
     */
    public static function hash($password) {
        return md5($password);
    }

}
