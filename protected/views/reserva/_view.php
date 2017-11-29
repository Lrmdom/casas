<div class="panel panel-default">
    <div class="panel-heading text-center">Reserva <?php echo CHtml::encode($data->id); ?></div>
    <div class="panel-body">
        <div class="col-xs-12 col-md-1 col-lg-1">

        </div>
        <div class="col-xs-12 col-md-3 col-lg-3">
            <?php
            if (isset($data->precos->casas))
                echo CHtml::image('/uploads/' . $data->precos->casas->img_1, '', array('class' => 'imgGridView img-polaroid img-responsive'));
            ?>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4">

            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('casa')); ?>:</b>
            <?php echo CHtml::encode($data->precos->casas->cod_casa); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('precos.inicio')); ?>:</b>
            <?php echo CHtml::encode($data->precos->inicio); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('precos.fim')); ?>:</b>
            <?php echo CHtml::encode($data->precos->fim); ?>
            <br />
            <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
            <?php echo CHtml::encode($data->valor); ?>
            <br />
            <br />
            <br />
            <div>
                <b><?php echo CHtml::encode($data->getAttributeLabel('states.state')); ?>:</b>
                <span class='alert alert-info'><?php echo CHtml::encode($data->states->state); ?></span>
            </div>
        </div>
        <div class="col-xs-12 col-md-4 col-lg-4">
            <b> Entregas:</b>
            <br>
            <?php
            $ventregas = 0;
            $saldo = 0;
            foreach ($data->payments as $payment) {
                echo CHtml::encode($payment->data) . " Eur :";
                echo CHtml::encode($payment->valor);
                $ventregas = $ventregas + $payment->valor;
                echo '<br>';
            }
            $saldo = $ventregas - $data->valor;
            if ($saldo < 0)
                echo "<div class='alert alert-error'>Saldo: $saldo</div>";
            else {
                echo "<div class='alert alert-success'>Saldo: $saldo</div>";
            }
            ?>
            <!--            <div class="buttons">
            <?php
//            echo CHtml::linkButton(
//                    'Alterar ', array('tag' => 'button',
//                'class' => 'btUpdateAlerta btAction',
//                'href' => Yii::app()->createUrl('reserva/update', array('id' => $data->id, 'referer' => 'client')),
//                    )
//            );
//            echo '<br><br>';
//            echo CHtml::linkButton(
//                    'Apagar ', array('tag' => 'button',
//                'class' => 'btDeleteAlerta btAction',
//                'href' => Yii::app()->createUrl('reserva/delete', array('id' => $data->id)),
//                'id' => 'btdel'
//                    )
//            );
            ?>
                        </div>-->

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
    }).attr('title', 'Actualizar Reserva');
    $('.btDeleteAlerta').button({
        icons: {
            primary: "ui-icon-trash"
        }
    }).attr('title', 'Apagar Reserva');

</script>