<?php
foreach ($data as $key => $casa) {
    ?>
   <li class="span2 ">
        <div class="thumbnail">
           <img class="imgGridView b" src="/uploads/<?php echo $casa->img_1 ?>" data-src="holder.js/160x120" alt="">
            <div class="pull-middle">
                <br>
                <a href="<?php echo Yii::app()->createUrl('//casa/client', array('id' => $casa->cod_casa)); ?>" class="btn btn-default">Ver esta propriedade</a>
           </div>
            <br>
           <div class="column fiximage">
                <?php echo CHtml::encode($casa->getAttributeLabel('for_sale')); ?>
                <?php echo CHtml::activeCheckBox($casa, 'for_sale', array('value' => $casa->for_sale, 'class' => 'chk', 'checked' => $casa->for_sale)); ?>
           </div>
            <div class="column fiximage">
                <?php echo CHtml::encode($casa->getAttributeLabel('for_arrenda')); ?>
                <?php echo CHtml::activeCheckBox($casa, 'for_arrenda', array('value' => $casa->for_arrenda, 'class' => 'chk', 'checked' => $casa->for_arrenda)); ?>
           </div>
            <div class="column fiximage">
                <?php echo CHtml::encode($casa->getAttributeLabel('for_rent')); ?>
                <?php echo CHtml::activeCheckBox($casa, 'for_rent', array('value' => $casa->for_rent, 'class' => 'chk', 'checked' => $casa->for_rent)); ?>
           </div>
            <div class="clearfix"></div>
        </div>
    </li>
<?php } ?>

<script>
    $('.chk').simpleImageCheck({
        image: '/css/images/uncheck.png',
        imageChecked: '/css/images/check.png'
    });
</script>
