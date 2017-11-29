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
                                    <h1>Hi, <?php echo $model->cliente->cliente ?></h1>
                                    <p class="lead">A reserva  <?php echo $model->id; ?> foi suplantada.
                                        Outro cliente ja reservou e pagou ou sinalizou este período.

                                    </p>
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
                                </td>
                                <td class="expander"></td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table>


            <?php include 'footer.php'; ?>











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