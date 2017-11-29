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
                                    <h1>Hi, <?php echo $model->precos->casas->casasprop->proprietario ?></h1>
                                    <p class="lead">A sua casa tem uma reserva</p>
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

                                    Reserva:
                                    <?php echo $model->id; ?>
                                    <br>
                                    Casa:
                                    <?php echo $model->precos->cod_casa ?>
                                    <br>
                                    De:
                                    <?php echo $model->precos->inicio ?>
                                    <br>
                                    Até:
                                    <?php echo $model->precos->fim ?>
                                    <br>
                                    Valor:
                                    <?php echo $model->precos->preco ?>
                                    <br>
                                    Estado:
                                    <?php echo $model->states->state ?>
                                    <br>
                                    Log In no site para aceder a informação. Gratos pela sua colaboração.  </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>

