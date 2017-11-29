<nav class="navbar navbar-default sidenavbar" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-adminMenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="sidebar-nav" id="collapse-adminMenu">
        <ul class="nav" id="side-menu">

            <li>
                <a class="" href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"><span class="glyphicon glyphicon-dashboard icon-warning"></span>  Dashboard <span class="pull-right"><span class="glyphicon glyphicon-bell icon-love"></span><span class="badge"><?php echo Casa::model()->dashboardAlerts(); ?></span></span></a>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('casa/admin') ?>"><span class="glyphicon glyphicon-home icon-warning"></span><?php echo Yii::t("content", "Casas") ?><span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('casa/admin') ?>"><?php echo Yii::t("content", "Gerir Casas") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('casa/create') ?>"><?php echo Yii::t("content", "Adicionar Casa") ?></a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-briefcase icon-warning"></span><?php echo Yii::t("content", "Proprietarios") ?> <span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('proprietario/admin') ?>"><?php echo Yii::t("content", "Gerir Proprietarios") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('proprietario/create') ?>"><?php echo Yii::t("content", "Adicionar proprietario") ?></a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-user icon-warning"></span><?php echo Yii::t("content", "Clientes") ?><span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('cliente/admin') ?>"><?php echo Yii::t("content", "Gerir Clientes") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('cliente/create') ?>"><?php echo Yii::t("content", "Adicionar Cliente") ?></a>
                    </li>

                </ul>

            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-list icon-warning"></span><?php echo Yii::t("content", "Reservas") ?><span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('reserva/dashboard') ?>"><?php echo Yii::t("content", "Gerir Reservas") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('reserva/createNew') ?>"><?php echo Yii::t("content", "Criar Reserva") ?></a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-bookmark icon-warning"></span><?php echo Yii::t("content", "Promoções") ?><span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('preco/adminPromo') ?>"><?php echo Yii::t("content", "Gerir Promoções") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('preco/new') ?>"></span><?php echo Yii::t("content", "Criar Promoção") ?></a>

                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-euro icon-warning"></span><?php echo Yii::t("content", "Pagamentos") ?><span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('reservaPayment/admin') ?>"><?php echo Yii::t("content", "Gerir Pagamentos") ?></a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-comment icon-warning"></span>Feedback<span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('feedback/admin') ?>"><?php echo Yii::t("content", "Gerir Opiniões") ?></a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><span class="glyphicon glyphicon-stats icon-warning"></span><?php echo Yii::t("content", "Estatísticas") ?><span class="glyphicon glyphicon-chevron-left  arrow"></span></a>

                <ul class="nav nav-second-level collapse">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('casa/stats') ?>"><?php echo Yii::t("content", "Estatísticas Site") ?></a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('casa/statsBookings') ?>"><?php echo Yii::t("content", "Estatísticas Casas") ?></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->

</nav>



<script>
    $(function() {
        $('#side-menu').metisMenu();
    });
</script>