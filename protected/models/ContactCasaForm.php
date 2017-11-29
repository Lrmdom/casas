<?php

class ContactCasaForm extends CFormModel {

    public $cod_casa;
    public $name;
    public $telefone;
    public $email;
    public $inicio;
    public $body;
    public $fim;
    public $preco;
    public $livre;
    public $idcliente;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            // name, email, subject and body are required
            array('name, email, cod_casa, body,telefone,fim,inicio', 'required', 'on' => 'contact'),
            // email has to be a valid email address
            array('name, email, cod_casa, telefone,fim,inicio,preco', 'required', 'on' => 'reserva'),
            array('email', 'email'),
            array('preco', 'safe', 'on' => 'search'),
                // verifyCode needs to be entered correctly
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name' => Yii::t('models', 'Nome'),
            'telefone' => Yii::t('models', 'Telefone'),
            'body' => Yii::t('models', 'Mensagem'),
            'email' => Yii::t('models', 'Email'),
        );
    }

}
