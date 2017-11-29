<?php if (Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success row">
        <?php echo Yii::app()->user->getFlash('success') ?>
    </div>
<?php endif ?>
<?php if (Yii::app()->user->hasFlash('error')): ?>
    <div class="flash-error row">
        <?php echo Yii::app()->user->getFlash('error') ?>
    </div>
<?php endif ?>

<?php
Yii::app()->clientScript->registerScript(
        'myHideEffect', '$(".flash-error,.flash-notice,.flash-success").animate({opacity: 1.0}, 6000).fadeOut("slow");', CClientScript::POS_READY
);
?>