<div class="container-fluid">
    <?php $model = new Reserva('search'); ?>
    <div role="tabpanel">
        <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
            <li role="presentation" class="active"><a  role="tab" data-toggle="tab" href="#tabs-1"><span class="glyphicon glyphicon-time icon-warning "></span> <?php echo Yii::t("content", "Reservas em curso") ?> <span class="badge"><?php echo $model->searchNow()->getTotalItemCount() ?></span></a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-2"> <span class="glyphicon glyphicon-flag icon-warning"></span> <?php echo Yii::t("content", "Reservas futuras") ?> <span class="badge"><?php echo $model->search(NULL)->getTotalItemCount() ?></span> </a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-3"> <span class="glyphicon glyphicon-paperclip icon-warning"> </span> <?php echo Yii::t("content", "Reservas arquivadas") ?> <span class="badge"><?php echo $model->searchArchive()->getTotalItemCount() ?> </span></a></li>

        </ul>
        <div class="tab-content">
            <div id="tabs-1" role="tabpanel" class="tab-pane active">

                <?php
                $model->unsetAttributes();
                echo $this->renderPartial("//reserva/adminNow", array(
                    'model' => $model,
                ));
                ?>        </div>

            <div id="tabs-2" role="tabpanel" class="tab-pane">

                <?php
                $model->unsetAttributes();
                echo $this->renderPartial("//reserva/admin", array(
                    'model' => $model,
                ));
                ?>        </div>
            <div id="tabs-3" role="tabpanel" class="tab-pane">


                <?php
                $model->unsetAttributes();
                echo $this->renderPartial("//reserva/adminArchive", array(
                    'model' => $model,
                ));
                ?>        </div>
        </div>

    </div>
</div>