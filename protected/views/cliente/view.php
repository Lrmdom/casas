
<div class="alert alert-warning" role="alert">
    <span class="glyphicon glyphicon-warning-sign icon-love"></span>
    <p><?php echo Yii::t("content", "Confira os dados. Se Email não estiver correto, estes não serão lidos") ?></p>
    <?php
    echo CHtml::linkButton(
            Yii::t('content', 'Alterar'), array('tag' => 'button',
        'class' => 'btCriaCliente btright',
        'href' => Yii::app()->createUrl('cliente/update/' . Yii::app()->user->id),
            )
    );
    ?>


</div>
<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model->find('clienteid=' . Yii::app()->user->id),
    'attributes' => array(
        'clienteid',
        'cliente',
        'telefone',
        'email',
        'morada',
        'cod_postal',
        'localidade',
        'pais',
        'subscribe_newsletter',
    ),
));
?>

<script>
    $('.btCriaCliente').button({
        icons: {
            primary: "ui-icon-pencil"
        }
    }).attr('title', 'Alterar');
</script>