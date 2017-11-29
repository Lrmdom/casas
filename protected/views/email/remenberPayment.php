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
                                    <p class="lead">Lembrete pagamento pre reserva <?php echo $model->id ?></p>
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
                                        Para tornar prereserva em reserva deve sinalizar com pagamento de 33% do valor total da reserva.

                                    </p>
                                    <p>
                                        Valor da reserva :<?php echo CHtml::encode($cn->formatCurrency($model->valor, 'EUR')); ?>
                                    </p>
                                    <p>
                                        Valor sinal :<?php echo CHtml::encode($cn->formatCurrency($model->valorSinal, 'EUR')); ?>
                                    </p>

                                    <h5> Data limite pagamento <?php echo date('Y-m-d', strtotime($model->data . ' + 7 days')); ?></h5>
                                </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>

