<?php $this->layout = "search" ?>

<h5>Registado com sucesso, com o código:<?php echo $model->propid; ?> </h5>
<h5>Vou enviado um email de activação para :<?php echo $model->email; ?></h5>



<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'propid',
        'proprietario',
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