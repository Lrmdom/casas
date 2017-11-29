<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs = array(
    'Feedbacks' => array('index'),
    'Create',
);
?>

<h3> Feedback casa <?php echo $model->cod_casa; ?><span class="nReservaAppend"></span> </h3>

<?php $this->renderPartial('//site/flashMessage'); ?>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>