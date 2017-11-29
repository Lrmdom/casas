<div class="container">
    <div class="row text-center">
        <?php
        echo CHtml::linkButton(
                'Criar Novo Alerta ', array('tag' => 'button',
            'class' => 'btn btn-large btn-primary',
            'href' => Yii::app()->createUrl('alert/create'),
                )
        );
        ?>
    </div>

    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider' => $model->search(),
        'itemView' => '//alert/_view',
        'summaryText' => '',
        'emptyText' => ''
    ));
    ?>

</div>
<script>
    $('.btCriaAlerta').button({
        icons: {
            primary: "ui-icon-circle-plus"
        }
    }).attr('title', 'Novo Alerta');

</script>