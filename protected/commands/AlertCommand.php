<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AlertCommand
 *
 * @author led
 */
class AlertCommand extends CConsoleCommand {

    //put your code here
    public function actionExamplealert() {
        $alert = new Alert;
        $alert->comandos();
        Periodo::model()->updateDates();
        PeriodoLongo::model()->updateDates();
        Preco::model()->deletePromos();
        Reserva::model()->archive();
        Mylist::model()->deleteOld();
    }

}

?>
