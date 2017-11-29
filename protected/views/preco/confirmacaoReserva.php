<div class="col-xs-6 col-md-6">
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
    <?php echo $model->valor ?>
    <br>
    Valor para sinalizar:
    <?php echo $model->valorSinal ?>
    <br>
    Estado:
    <?php echo $model->states->state ?>
    <br>
    Obrigado pela sua reserva. Aguardamos contacto para confirmação com sinalização. A sua reserva só é válida após boa cobrança do sinal.
</div>
<div class="col-xs-6 col-md-6">
    <?php echo $this->renderPartial("//reserva/clientview", array('model' => $model)); ?>
</div>