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
                                    <h1>Hi, <?php echo $model->name ?></h1>
                                    <p class="lead">Obrigado pelos seu contato</p>
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
                                    <?php
                                    echo $model->name;
                                    echo $model->email;
                                    ?>
                                    contacto confirmado email                              </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>                                                                        <br>
