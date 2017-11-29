<?php

class DashboardController extends Controller {
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('infoToClients', 'mylists', 'view', 'register', 'PwdRecover', 'captcha', 'confirmacaoGuest', 'activaProp', 'PwdRecoverConfirm'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $this->layout = "column2";

        $fdkcount = Feedback::model()->revised();
        $preReservasCount = count(Reserva::model()->searchPrereservas()->getData());
        $casas = Casa::model()->inactive();
        $nofdk = Reserva::model()->searchFeedback()->getdata();
        $casas = $this->render('//site/dashboard', array(
            'fdk' => $fdkcount,
            'preResCount' => $preReservasCount,
            'casas' => $casas,
            "nofdk" => count($nofdk),
                )
        );
    }

}
