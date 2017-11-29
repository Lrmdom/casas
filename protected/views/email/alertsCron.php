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
                                    <h4>Hi, <?php echo $client->cliente ?></h4>
                                    <p class="lead">Resultados do seu alerta</p>
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
                        <?php if (count($casasSale) > 0): ?>
                            <table class="twelve columns">
                                <tr>
                                    <td class="panel">
                                        <h4>Para venda</h4>
                                        <?php foreach ($casasSale as $key => $casa) { ?>

                                            <a href="<?php //echo Yii::app()->createUrl("casa/client", array("id" => $casa->cod_casa))   ?>">

                                                <?php echo $casa->seo_title ?>
                                            </a><br/>
                                        <?php } ?>
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </table>
                        <?php endif; ?>

                        <?php if (count($casasHoliday) > 0): ?>
                            <table class="twelve columns">
                                <tr>
                                    <td class="panel">
                                        <h4>Para ferias</h4>
                                        <?php foreach ($casasHoliday as $key => $casa) { ?>

                                            <a href="<?php //echo Yii::app()->createUrl("casa/client", array("id" => $casa->cod_casa))   ?>">

                                                <?php echo $casa->seo_title ?>
                                            </a><br/>
                                        <?php } ?>
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </table>
                        <?php endif; ?>
                        <?php if (count($casasRent) > 0): ?>
                            <table class="twelve columns">
                                <tr>
                                    <td class="panel">
                                        <h4>Para arrendamento</h4>
                                        <?php foreach ($casasRent as $key => $casa) { ?>

                                            <a href="<?php //echo Yii::app()->createUrl("casa/client", array("id" => $casa->cod_casa))   ?>">

                                                <?php echo $casa->seo_title ?>
                                            </a><br/>
                                        <?php } ?>
                                    </td>
                                    <td class="expander"></td>
                                </tr>
                            </table>
                        <?php endif; ?>



                    </td>
                </tr>
            </table>
            <?php include 'footer.php'; ?>
