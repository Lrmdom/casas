<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <?php echo CHtml::encode($data->clientes->cliente); ?>
        </div>
        <div class="col-md-3 col-lg-3">
            <input  name="star1<?php echo CHtml::encode($data->id); ?>" type="radio" class="star" value="1"/>
            <input  name="star1<?php echo CHtml::encode($data->id); ?>" type="radio" class="star" value="2"/>
            <input  name="star1<?php echo CHtml::encode($data->id); ?>" type="radio" class="star" value="3"/>
            <input  name="star1<?php echo CHtml::encode($data->id); ?>" type="radio" class="star" value="4"/>
            <input  name="star1<?php echo CHtml::encode($data->id); ?>" type="radio" class="star" value="5"/>
        </div>
        <div class="col-md-6 col-lg-6"><?php echo CHtml::encode($data->comment); ?></div>

    </div>
</div>
<script>
    $(function() {
        $("[name='star1<?php echo CHtml::encode($data->id); ?>']").rating('select',<?php echo CHtml::encode($data->valor_voto) - 1; ?>);
    });
</script>