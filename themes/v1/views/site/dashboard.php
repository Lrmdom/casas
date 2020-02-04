<div class="container-fluid">

    <div role="tabpanel">
        <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
            <li role="presentation" class="active"><a  role="tab" data-toggle="tab" href="#tabs-2"><span class="glyphicon glyphicon-list icon-warning "></span> <?php echo Yii::t("content", "Pre-reservas") ?> <span class="badge"><?php echo $preResCount ?></span></a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-3"> <span class="glyphicon glyphicon-home icon-warning"></span> <?php echo Yii::t("content", "Casas Inativas") ?> <span class="badge"><?php echo $casas ?></span> </a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-1"> <span class="glyphicon glyphicon-headphones icon-warning"> </span> <?php echo Yii::t("content", "Rever Feedback") ?> <span class="badge"><?php echo $fdk ?> </span></a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-5"> <span class="glyphicon glyphicon-comment icon-warning"></span> <?php echo Yii::t("content", "Reservas sem feedback") ?> <span class="badge"><?php echo $nofdk ?></span></a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-4"><span class="glyphicon glyphicon-calendar icon-warning"></span> <?php echo Yii::t("content", "Calendario") ?> <span class="badge">-</span></a></li>
            <li role="presentation"><a  role="tab" data-toggle="tab" href="#tabs-6"><span class="glyphicon glyphicon-calendar icon-warning"></span> <?php echo Yii::t("content", "Ver Disponibilidades") ?> <span class="badge">-</span></a></li>

        </ul>
        <div class="tab-content">
            <div id="tabs-1" role="tabpanel" class="tab-pane">
                <?php
                $model = new Feedback('search');
                $model->unsetAttributes();
                echo $this->renderPartial("//feedback/adminCheck", array(
                    'model' => $model,
                ));
                ?>        </div>
            <div id="tabs-2" role="tabpanel" class="tab-pane active">
                <?php
                $model = new Reserva("search");
                $model->unsetAttributes();
                $this->renderPartial('//reserva/prereservas', array(
                    'model' => $model,
                ));
                ?>        </div>
            <div id="tabs-3" role="tabpanel" class="tab-pane">
                <?php
                $model = new Casa("search");
                $model->unsetAttributes();
                $this->renderPartial('//casa/admin', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <div id="tabs-4" role="tabpanel" class="tab-pane">
                <?php if (Yii::app()->user->name == Yii::app()->params["adminEmail"]): ?>
                    <iframe src="https://www.google.com/calendar/embed?src=<?php echo Yii::app()->params['calendarID'] ?>&ctz=Europe/Lisbon" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                <?php endif ?>
            </div>
            <div id="tabs-5" role="tabpanel" class="tab-pane">
                <?php
                $model = new Reserva("search");
                $model->unsetAttributes();
                $this->renderPartial('//reserva/adminFeedback', array(
                    'model' => $model,
                ));
                ?>
            </div>
            <div id="tabs-6" role="tabpanel" class="tab-pane">
                <?php
                $model = new Preco();
                $model->unsetAttributes();
                $this->renderPartial('//reserva/availabilities', array(
                    'model' => $model,
                ));
                ?>
            </div>

        </div>



    </div>


</div>



