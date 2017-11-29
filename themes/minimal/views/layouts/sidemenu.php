<nav class="navbar navbar-default affix sidenavbar" role="navigation" style="margin-bottom: 0">
    <div class="navbar-default sidebar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href='<?php echo Yii::app()->createUrl('site/index') ?>'> Admin Menu</a>
        </div>
        <div class="sidebar-nav navbar-collapse" id="collapse-2">
            <ul class="nav" id="side-menu">

                <li>
                    <a class="active" href="<?php echo Yii::app()->createUrl('dashboard/index') ?>"> Dashboard<span class="glyphicon glyphicon-bell icon-love pull-right"><span class="badge"><?php echo Casa::model()->dashboardAlerts(); ?></span></span></a>
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('casa/admin') ?>"> Casas<span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('casa/admin') ?>">Gerir Casas</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('casa/create') ?>">Adicionar Casa</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#"> Proprietarios<span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('proprietario/admin') ?>">Gerir Proprietarios</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('proprietario/create') ?>">Adicionar proprietario</a>
                        </li>

                    </ul>

                </li>
                <li>
                    <a href="#">Clientes<span class="glyphicon glyphicon-chevron-left arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('cliente/admin') ?>">Gerir Clientes</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('cliente/create') ?>">Adicionar Cliente</a>
                        </li>

                    </ul>

                </li>
                <li>
                    <a href="#">Reservas<span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('reserva/admin') ?>">Gerir Reservas</a>
                        </li>
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('reserva/create') ?>">Criar Reserva</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#">Pagamentos<span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('reservaPayment/admin') ?>">Gerir Pagamentos</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#">Opiniões<span class="glyphicon glyphicon-chevron-left  arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo Yii::app()->createUrl('feedback/admin') ?>">Gerir Opiniões</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>

</nav>