<?php $this->beginContent('//layouts/mainBack'); ?>

<div id="content" class="container-fluid">
    <div class="row-fluid">
        <div class="col-lg-2 col-md-4 col-xs-12">
            <?php echo $this->renderPartial('//layouts/sidemenu'); ?>
        </div>
        <div class="col-lg-10 col-md-8 col-xs-12">
            <?php echo $content; ?>
        </div>
    </div>
</div><!-- content -->
<?php $this->endContent(); ?>
