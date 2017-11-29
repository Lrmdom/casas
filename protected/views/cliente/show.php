<?php
/* @var $this ClienteController */
/* @var $model Cliente */

$this->breadcrumbs = array(
    'Clientes' => array('index'),
    $cliente->clienteid,
);

$this->layout = 'search';
$this->model = new Casa();
?>

<h3 class="well">A minha Conta</h3>

<div id="tabscliente" class="well-small">
    <ul>
        <li><a href="#tabs-1">Conta</a></li>
        <li><a href="#tabs-2">Reservas</a></li>
        <li><a href="#tabs-3">Alertas</a></li>
        <li><a href="#tabs-4">Favoritos</a></li>
        <li><a href="#tabs-5">Agenda</a></li>
        <li><a href="#tabs-6">Os meus Feedbacks</a></li>
    </ul>
    <div id="tabs-1">
        <?php echo $this->renderPartial('view', array('model' => $cliente)); ?>
    </div>
    <div id="tabs-2">
        <?php echo $this->renderPartial('//reserva/indexCliente', array('model' => new Reserva('searchCliente'))); ?>
    </div>
    <div id="tabs-3">
        <?php echo $this->renderPartial('//alert/index', array('model' => new Alert('Search'))); ?>
    </div>
    <div id="tabs-4">
        <?php echo $this->renderPartial('//mylist/index', array('model' => new Mylist('Search'))); ?>
    </div>
    <div id="tabs-5">
        <?php echo $this->renderPartial('//visita/index', array('model' => new Visita('Search'))); ?>
    </div>
    <div id="tabs-6">
        <?php echo $this->renderPartial('//feedback/indexCliente', array('model' => new Feedback('Search'))); ?>
    </div>

</div>
<script>
<?php
if ($referer = 'periodo') {
    echo '   $("#tabscliente").tabs({ selected: 2 }); ';
} else {
    echo '   $("#tabscliente").tabs({ selected: 1 }); ';
}
?>
</script>

