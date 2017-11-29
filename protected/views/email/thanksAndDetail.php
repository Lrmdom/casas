<?php
include 'head.php';
$cn = new CNumberFormatter(Yii::app()->getLanguage());
?>


<table class="container">
    <tr>
        <td>

            <table class="row">
                <tr>
                    <td class="wrapper last">

                        <table class="twelve columns">
                            <tr>
                                <td>
                                    <h4>Hi, <?php echo $model->cliente->cliente; ?></h4>
                                    <p class="lead">Obrigado pela sua reserva <?php echo $model->id ?></p>
                                </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>

            <table class="row callout">
                <tr>
                    <td class="wrapper last">

                        <table class="twelve columns">
                            <tr>
                                <td class="panel">
                                    <p>
                                        O estado da sua reserva :<?php echo $model->states->state ?>

                                    </p>
                                    <p>
                                        Valor da reserva :<?php echo CHtml::encode($cn->formatCurrency($model->valor, 'EUR')); ?>
                                    </p>
                                    <p>
                                        <?php echo $this->renderPartial('//reservaPayment/adminReserva', array('model' => new ReservaPayment(), 'reserva' => $model)); ?>
                                    </p>

                                    <h5> Saldo: <?php echo ReservaPayment::model()->getTotals($model->id) ?></h5>
                                </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>

