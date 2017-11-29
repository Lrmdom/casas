<?php include 'head.php'; ?>


<table class="container">
    <tr>
        <td>

            <table class="row">
                <tr>
                    <td class="wrapper last">

                        <table class="twelve columns">
                            <tr>
                                <td>
                                    <h1>Hi, <?php
                                        if ($model->TableName() == 'proprietario') {
                                            echo $model->proprietario;
                                        } else {
                                            echo $model->cliente;
                                        }
                                        ?></h1>
                                    <p class="lead">Confirmação de registo</p>
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

                                    Este email serve para confirmar os eu endereço de email.<br>
                                    Click no link para activar a sua conta

                                    <?php
                                    if ($model->TableName() == 'proprietario') {
                                        $person = $model->propid;
                                    } else {
                                        $person = $model->clienteid;
                                    }
                                    echo CHtml::link("Ativar conta.Click ", Yii::app()->createAbsoluteUrl($model->TableName() . '/activaprop', array('id' => $person, 'sessid' => $model->sessid)));
                                    ?>                              </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>                                                                        <br>

