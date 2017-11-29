<?php $this->beginContent('//layouts/main'); ?>

<div class="span-19 well">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Escolha acção    <div class="pull-right">  <i class="icon-list"></i></div>',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
<?php $this->endContent(); ?>
<script>
        $(function() {
           $( ".datepick" ).datepicker({ dateFormat: "yy/mm/dd" });
       });
    </script>