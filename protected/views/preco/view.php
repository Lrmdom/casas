<fieldset>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            array('label' => 'Casa', 'type' => 'raw', 'value' => CHtml::link($model->cod_casa, array('casa/update', 'id' => $model->cod_casa))),
            'inicio',
            'fim',
            'preco',
        ),
    ));
    ?>
</fieldset>

