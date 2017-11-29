<?php

/* @var $this VisitaController */
/* @var $model Visita */

$this->breadcrumbs = array(
    'Visitas' => array('index'),
    'Create',
);

$this->menu = array(
    array('label' => 'List Visita', 'url' => array('index')),
    array('label' => 'Gerir Visita', 'url' => array('admin')),
);
?>
<script>

    $(document).on('click', '.datepick', function() {
        $(this).datepicker();
    });

</script>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>
