<div class="container-fluid">

    <div id="tabs">
        <ul>
            <li><a href="#tabs-2"><span class="badge"><?php echo $preResCount ?></span> pre-reservas</a></li>
            <li><a href="#tabs-3"><span class="badge"><?php echo $casas ?> </span> casas inativas</a></li>
            <li><a href="#tabs-1"><span class="badge"><?php echo $fdk ?> </span> opiniões esperam revisão</a></li>
            <li><a href="#tabs-5"><span class="badge"><?php echo $nofdk ?></span> reservas sem feedback</a></li>
            <li><a href="#tabs-4">Calendario</a></li>
        </ul>
        <div id="tabs-1">
            <?php
            $model = new Feedback('search');
            $model->unsetAttributes();
            echo $this->renderPartial("//feedback/adminCheck", array(
                'model' => $model,
            ));
            ?>        </div>
        <div id="tabs-2">
            <?php
            $model = new Reserva(search);
            $model->unsetAttributes();
            $this->renderPartial('//reserva/prereservas', array(
                'model' => $model,
            ));
            ?>        </div>
        <div id="tabs-3">
            <?php
            $model = new Casa(search);
            $model->unsetAttributes();
            $this->renderPartial('//casa/admin', array(
                'model' => $model,
            ));
            ?>
        </div>
        <div id="tabs-4">
            <?php if (Yii::app()->user->name == Yii::app()->params["adminEmail"]): ?>
                <iframe src="https://www.google.com/calendar/embed?src=<?php echo Yii::app()->params['calendarID'] ?>&ctz=Europe/Lisbon" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
            <?php endif ?>
        </div>
        <div id="tabs-5">
            <?php
            $model = new Reserva(search);
            $model->unsetAttributes();
            $this->renderPartial('//reserva/adminFeedback', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>


</div>
<script>
    $(function() {
        $("#tabs").tabs();
    });
</script>