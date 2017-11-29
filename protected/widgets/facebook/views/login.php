<?php if (Yii::app()->user->isGuest): ?>
    <button class="btn btn-primary btn-block" id="<?php echo $this->fbLoginButtonId; ?>"><span><?php echo $this->facebookButtonTitle; ?></span></button>
        <?php endif; ?>

