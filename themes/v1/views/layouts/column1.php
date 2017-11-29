

<?php
$this->beginContent('//layouts/main');

if (!isset($_SESSION['inicio']))
    $_SESSION['inicio'] = ' ';
if (!isset($_SESSION['fim']))
    $_SESSION['fim'] = ' ';
$model = new Casa();
if (isset($_POST['Casa']))
    $model->attributes = $_POST['Casa'];

if (isset($_GET['Casa']))
    $model->attributes = $_GET['Casa'];
$this->model = new Casa();
$this->inic = "";
$this->fim = "";
?>
<div id="tabs" class="row-fluid">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#search" data-toggle="tab"><?php echo Yii::t('content', 'Pesquisa Rapida') ?></a>
        </li>
        <li><a href="#advsearch" data-toggle="tab"><?php echo Yii::t('content', 'pesquisa Avançada') ?></a></li>
    </ul>
    <div class="tab-content">
        <div id="search" class="tab-pane active">

            <?php echo $this->renderPartial('//site/quickSearch') ?>


        </div>
        <div id="advsearch" class="tab-pane">
            <div class="form-inline">

                <?php echo $this->renderPartial('//site/search', array('model' => $model, 'inicio' => $this->inic, 'fim' => $this->fim)) ?>
            </div>
        </div>
    </div>

</div>
<script>
    $(function() {

        $(".linkTabsMap").click(function(e) {
            e.preventDefault();
            window.location = "/index.php/site/mapa";
        });
        $(".AcertifImg").click(function(e)
        {
            $(this).addClass('popactive');
            e.preventDefault();
            $(".AcertifImg.popactive").popover('hide');
        });
        $(".AcertifImg").popover({title: 'Certificada', content: "O que é uma casa certificada?", placement: 'top', trigger: 'hover'});


    });
</script>



<?php echo $content; ?>

<?php $this->endContent(); ?>
