<div class="view">
    <div class="divbuttons">
        <?php
        echo CHtml::linkButton(
                'Remover', array('tag' => 'button',
            'class' => 'btDeleteAlerta btAction',
            'href' => Yii::app()->createUrl('compare/delete', array('id' => $data->id)),
                )
        );
        ?>
        <?php if ($data->casa->for_rent == 1): ?>
            <br>
            <a class="btClassificaCasa btAction" href="<?php echo Yii::app()->createUrl('feedback/create', array('id' => $data->casa->cod_casa)) ?>">Classificar</a>
        <?php endif; ?>
        <?php if ($data->casa->for_sale == 1): ?>
            <br>
            <a class="btAgVisitaCasa btAction" href="<?php echo Yii::app()->createUrl('visita/create', array('id' => $data->casa->cod_casa)) ?>">Agendar Visita</a>
        <?php endif; ?>
        <br>
        <a class="btViewCasa btAction" href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->casa->cod_casa)) ?>">Detalhes</a>
    </div>
    <div class="pull-right">
        <div class="column fiximage">
            <?php echo CHtml::encode($data->casa->getAttributeLabel('for_sale')); ?>
            <?php echo CHtml::activeCheckBox($data, 'for_sale', array('value' => $data->casa->for_sale, 'class' => 'chk', 'checked' => $data->casa->for_sale)); ?>
        </div>
        <div class="column fiximage">
            <?php echo CHtml::encode($data->casa->getAttributeLabel('for_arrenda')); ?>
            <?php echo CHtml::activeCheckBox($data, 'for_arrenda', array('value' => $data->casa->for_arrenda, 'class' => 'chk', 'checked' => $data->casa->for_arrenda)); ?>
        </div>
        <div class="column fiximage">
            <?php echo CHtml::encode($data->casa->getAttributeLabel('for_rent')); ?>
            <?php echo CHtml::activeCheckBox($data, 'for_rent', array('value' => $data->casa->for_rent, 'class' => 'chk', 'checked' => $data->casa->for_rent)); ?>
        </div>

    </div>
    <div class="clearfix"></div>
    <div class="row-fluid column fiximage"> <a href="<?php echo Yii::app()->createUrl('casa/client', array('id' => $data->casa->cod_casa)) ?>">
            <?php echo CHtml::image('/uploads/' . $data->casa->img_1, '', array('class' => 'img-responsive thumbnail img-polaroid')); ?>
        </a>
    </div>
    <div class="column descript"><h2 class="inline">#<?php echo CHtml::encode($data->casa->cod_casa); ?></h2> <h3 class="inline"> <?php echo CHtml::encode($data->casa->designacao); ?></h3>
        <br>
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('destino')); ?>:</b>
        <?php echo CHtml::encode($data->casa->destino); ?>,
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('casasbanho')); ?>:</b>
        <?php echo CHtml::encode($data->casa->casasbanho); ?>,
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('quartos')); ?>:</b>
        <?php echo CHtml::encode($data->casa->quartos); ?>,
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('pessoas')); ?>:</b>
        <?php echo CHtml::encode($data->casa->pessoas); ?>
        <br />
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('camascasal')); ?>:</b>
        <?php echo CHtml::encode($data->casa->camascasal); ?>,
        <b class="colored"><?php echo CHtml::encode($data->casa->getAttributeLabel('camassingle')); ?>:</b>
        <?php echo CHtml::encode($data->casa->camassingle); ?>
        <br />
        <b class="colored">
            <?php echo CHtml::encode($data->casa->tipoalojamento); ?>,
            <?php echo CHtml::encode($data->casa->tipo); ?>
        </b>
        <br />
        <p><b class="colored"><?php echo CHtml::encode($data->casa->localidade); ?> > <?php echo CHtml::encode($data->casa->pais); ?></b></p>
    </div>

</div>
<script>
    $('.view').mouseover(function() {
        $(this).children('.divbuttons').show();
    });
    $('.view').mouseout(function() {
        $(this).children('.divbuttons').hide();
    });
    $('.btDeleteAlerta').button({
        icons: {
            primary: "ui-icon-trash"
        }
    }).attr('title', 'Apagar dos favoritos');
    ;
    $(".imgGridView").livequery('mouseenter', function(event) {
        event.stopImmediatePropagation();
        $(".dlg").dialog({autoOpen: false, position: {my: "left top", at: "left top", of: this},
            show: {
                effect: 'fade',
                duration: 100
            }}).siblings('.ui-dialog-titlebar').remove();
        $(".dlg").dialog('open');
        $(".dlg").html('<img src="/css/images/ajax-loader.gif" />').load("<?php echo Yii::app()->createUrl('casa/clientdialog', array('id' => $data->cod_casa)) ?>");
    });
    $(".imgGridView").mouseleave(function(event) {
        event.stopImmediatePropagation();
        $(".dlg").mouseleave(function() {
            event.stopImmediatePropagation();
            $(".dlg").empty();
            $(".dlg").dialog("close");
        });
    });

</script>