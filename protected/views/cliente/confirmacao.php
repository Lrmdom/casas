<?php $this->layout = "search" ?>

<h5>Registado com sucesso, com o código:<?php echo $model->clienteid; ?> </h5>
<h5>Vou enviado um email de activação para :<?php echo $model->email; ?></h5>



<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'clienteid',
        'cliente',
        'telefone',
        'email',
        'morada',
        'cod_postal',
        'localidade',
        'pais',
        'activo',
    ),
));
?>
