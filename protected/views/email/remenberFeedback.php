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
                                    <p class="lead">Lembrete atribuição feedback para reserva <?php echo $model->id ?></p>
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
                                    <p>Login na sua area de cliente e em reservas, classificar</p>
                                </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>

