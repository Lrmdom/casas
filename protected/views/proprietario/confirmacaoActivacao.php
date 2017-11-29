<?php $this->layout = "search" ?>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model->find('propid=' . $model->propid),
    'attributes' => array(
        'propid',
        'proprietario',
        'telefone',
        'email',
        'morada',
        'cod_postal',
        'localidade',
        'pais',
    ),
));
?>
<div class="alert alert-success">
    <p>O seu email foi confirmado</p>
    <p>A sua conta está activa.</p>
    <a href="<?php echo Yii::app()->createUrl('site/loginOwner') ?>" class="btn btn-primary">Login</a>
</div>