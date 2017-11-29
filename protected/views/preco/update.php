<?php
$casa = $model->cod_casa;

$this->breadcrumbs = array(
    'Precos' => array('index'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);
?>

<h3>Update Casa <?php echo $model->cod_casa; ?> Periodo <?php echo $model->id; ?></h3>

<div id="tabs">
    <ul>
        <li><a href="#tabs-2">Localização e Características</a></li>
        <li><a href="#tabs-1">Disponibilidade</a></li>
        <li><a href="#tabs-7">Preços</a></li>
        <li><a href="#tabs-4">Imagens</a></li>
        <li><a href="#tabs-5" >Reservas</a></li>
        <li><a href="#tabs-6" >Feedback</a></li>
    </ul>
    <div id="tabs-2">
        <?php echo $this->renderPartial('//casa/_form', array('model' => $modelCasa, 'cod_casa' => $model->cod_casa)); ?>
    </div>
    <div id="tabs-1">
        <?php
        echo $this->renderPartial('//preco/_form', array(
            'model' => $model,
            'cod_casa' => $modelCasa->cod_casa,
            'referer' => 'preco',
            'idpreco' => $model->id,
            'modelCasa' => $modelCasa,
                ), true);
        ?>
    </div>
    <div id="tabs-7">
        <?php if ($modelCasa->certif == 1): ?>
            <?php echo $this->renderPartial('//periodo/_form', array('model' => new Periodo(), 'cod_casa' => $model->cod_casa)); ?>
<?php endif ?>
    </div>
    <div id="tabs-4">
<?php echo $this->renderPartial('//casa/uploadCasaImages', array('model' => $modelCasa, 'cod_casa' => $model->cod_casa)); ?>
    </div>
    <div id="tabs-5">
        <?php if ($modelCasa->certif == 1): ?>
            <?php echo $this->renderPartial('//reserva/admin', array('idpreco' => $model->id, 'model' => new Reserva(), 'cod_casa' => $casa, 'modelCasa' => $model, 'referer' => 'casa')); ?>
<?php endif ?>
    </div>
    <div id="tabs-6">
<?php echo ('FEEDBACK'); ?>
    </div>

</div>
<script>
    $("#tabs").tabs({selected: 1});

</script>
