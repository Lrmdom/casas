<?php
if (!Yii::app()->user->isGuest) :

    $favoritos = count(Mylist::model()->findAll(array('condition' => 'cliente=' . Yii::app()->user->id)));
    $alertas = count(Alert::model()->findAll(array('condition' => 'id_cliente=' . Yii::app()->user->id)));
    $reservas = count(Reserva::model()->findAll(array('condition' => 'idcliente=' . Yii::app()->user->id)));
    $compares = count(Compare::model()->findAll(array('condition' => 'cliente=' . Yii::app()->user->id)));
    ?>
    <li><a href="<?php echo Yii::app()->createUrl('cliente/mycompares/' . Yii::app()->user->id) ?>"><span class="glyphicon glyphicon-eye-open icon-success"></span> <?php echo Yii::t("content", "Comparar(") ?><span class="compareCount icon-success"><?php
                echo $compares;
                ?></span>)</a></li>
    <li class="wishlist"><a href="<?php echo $this->createUrl('cliente/mylists/' . Yii::app()->user->id) ?>">
            <span class="glyphicon glyphicon-heart icon-love"></span> <?php echo Yii::t("content", "Favoritos(") ?><span class="favcount icon-love"><?php
                echo $favoritos;
                ?></span>)  </a></li>
    <li><a href="<?php echo $this->createUrl('cliente/myalerts/' . Yii::app()->user->id) ?>"><span class="glyphicon glyphicon-bell icon-warning"></span> <?php echo Yii::t("content", "Alertas(") ?><span class="alertcount icon-warning"><?php
                echo $alertas;
                ?></span>)   </a></li>
    <li><a href="<?php echo Yii::app()->createUrl('cliente/mybookings/' . Yii::app()->user->id) ?>"><span class="glyphicon glyphicon-tags icon-trust"></span> <?php echo Yii::t("content", "Reservas(") ?><span class="reservascount icon-trust"><?php
                echo $reservas;
                ?></span>)</a></li>


    <?php
else:

    $alertas = 0;
    $reservas = 0;
    $favoritos = count(Mylist::model()->findAll(array('condition' => 'sessid="' . Yii::app()->session->getSessionID() . '"')));
    $compares = count(Compare::model()->findAll(array('condition' => 'sessid="' . Yii::app()->session->getSessionID() . '"')));
    ?>
    <li class="wishlist"><a href="<?php echo $this->createUrl('cliente/mylists/' . Yii::app()->user->id) ?>">
            <span class="glyphicon glyphicon-heart icon-love"></span> <?php echo Yii::t("content", "Favoritos(") ?><span class="favcount icon-love"><?php
                echo $favoritos;
                ?></span>)  </a></li>
    <li class="compareList"><a href="<?php echo $this->createUrl('cliente/mycompares/' . Yii::app()->user->id) ?>">
            <span class="glyphicon glyphicon-eye-open icon-success"></span> <?php echo Yii::t("content", "Comparar(") ?><span class="CompareCount icon-success"><?php
                echo $compares;
                ?></span>)  </a></li>
<?php endif; ?>