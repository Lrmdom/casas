<?php $this->renderPartial('//site/flashMessage'); ?>
<div class="alert alert-warning" role="alert">
    <span class="glyphicon glyphicon-warning-sign icon-love"></span>
    <p><?php echo Yii::t("content", "Confira os dados. Se Email não estiver correto, estes não serão lidos") ?></p>
    <?php
    echo CHtml::linkButton(
            Yii::t('content', 'Alterar'), array('tag' => 'button',
        'class' => 'btCriaCliente btright',
        'href' => Yii::app()->createUrl('proprietario/update/' . Yii::app()->user->id),
            )
    );
    ?>


</div>
<div class="well">
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
</div>

<script>
    $('.btCriaCliente').button({
        icons: {
            primary: "ui-icon-pencil"
        }
    }).attr('title', 'Alterar');
</script>