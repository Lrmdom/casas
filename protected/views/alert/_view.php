<div class="panel panel-default">
    <div class="panel-heading text-center">Alerta</div>
    <div class="panel-body">
        <div class="col-lg-2 col-md-2 col-sm-1">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-10">

            <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_alojamento')); ?>:</b>
            <?php echo CHtml::encode($data->id_tipo_alojamento); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
            <?php echo CHtml::encode($data->id_tipo); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
            <?php echo CHtml::encode($data->valor); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('pessoas')); ?>:</b>
            <?php echo CHtml::encode($data->pessoas); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('destino')); ?>:</b>
            <?php echo CHtml::encode($data->destino); ?>
            <br />


            <b><?php echo CHtml::encode($data->getAttributeLabel('for_rent')); ?>:</b>
            <?php echo CHtml::encode($data->for_rent); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('for_sale')); ?>:</b>
            <?php echo CHtml::encode($data->for_sale); ?>
            <br />

            <b><?php echo CHtml::encode($data->getAttributeLabel('for_arrenda')); ?>:</b>
            <?php echo CHtml::encode($data->for_arrenda); ?>
            <br />
        </div>
        <div class="col-lg-2 col-md-2 col-sm-1 buttons">

            <?php
            echo '<br><br>';
            echo CHtml::linkButton(
                    'Alterar ', array('tag' => 'button',
                'class' => 'btUpdateAlerta btAction',
                'href' => Yii::app()->createUrl('alert/update', array('id' => $data->id)),
                    )
            );
            echo '<br><br>';
            echo CHtml::linkButton(
                    'Apagar ', array('tag' => 'button',
                'class' => 'btDeleteAlerta btAction',
                'href' => Yii::app()->createUrl('alert/delete', array('id' => $data->id)),
                'id' => 'btdel'
                    )
            );
            ?>
        </div>
    </div>
</div>

<script>
    $('.view').mouseover(function() {
        $(this).children('.divbuttons').show();
    });
    $('.view').mouseout(function() {
        $(this).children('.divbuttons').hide();
    });

    $('.btUpdateAlerta').button({
        icons: {
            primary: "ui-icon-pencil"
        }
    }).attr('title', 'Actualizar Alerta');
    $('.btDeleteAlerta').button({
        icons: {
            primary: "ui-icon-trash"
        }
    }).attr('title', 'Apagar Alerta');

</script>