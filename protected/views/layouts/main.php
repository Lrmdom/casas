<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
       <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
       <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foffice.css" />
       <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php
        Yii::app()->clientScript
               ->registerScriptFile(Yii::app()->baseUrl . '/js/jquery-ui.min.js')
                ->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.form.js')
                ->registerScriptFile(Yii::app()->baseUrl . '/js/jquery.validate.js')
       ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.8.17.custom.css" />
   </head>
   <body >
       <div class="container" id="page">
           <div id="header-links">
                <span>
                    <span>
                        <span>Suporte ao cliente teste docker</span>
                        <span >(Seg-Dom 9-18)</span>
                    </span>
                    <span class="phones">
                        (+351)281956272 , (+351)966684564 555
                   </span>
               </span>
                <span><ul class="menu-header-links">
                       <li><?php echo CHtml::link('Login Proiprietários', Yii::app()->createUrl('//site/loginOwner')); ?></li>
                        <li>Registrar</li>
                        <li>Ajuda</li>
                        <li>Adicionar a sua Casa333</li>
                    </ul></span> 
           </div>
           <div id="header">
                <div id="logo"></div>
           </div><!-- header -->
           <div id="mainmenu">

<?php
$this->widget('zii.widgets.CMenu', array(
    'items' => array(
        array('label' => 'Home', 'url' => array('/site/index')),
        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
        array('label' => 'Contact', 'url' => array('/site/contact')),
        array('label' => 'Alertas (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => Yii::app()->user->getState('isAdmin') == 'Front'),
        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
        array('label' => 'Hi (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest,'itemOptions'=>array('class'=>'himenu'),),
    ),
));
?>
       </div><!-- mainmenu -->
        <div class="accountBox">
            <ul>
                <li><?php echo CHtml::link('Minha Conta', Yii::app()->createUrl('//cliente/view',array('id'=>Yii::app()->user->id))); ?>
                <li><?php echo CHtml::link('Minhas Escolhas', Yii::app()->createUrl('//cliente/showWislist',array('id'=>Yii::app()->user->id,'referer'=>'wislist'))); ?>
                <li><?php echo CHtml::link('Minhas Reservas', Yii::app()->createUrl('//cliente/showReserva',array('id'=>Yii::app()->user->id,'referer'=>'reserva'))); ?>
                <li><?php echo CHtml::link('Meus Alertas', Yii::app()->createUrl('//cliente/ShowAlerta',array('id'=>Yii::app()->user->id,'referer'=>'alerta'))); ?>
                <li><?php echo CHtml::link('Logout/Sair', Yii::app()->createUrl('//site/logout',array('id'=>Yii::app()->user->id))); ?>
            </ul>
        </div>
<?php if (isset($this->breadcrumbs)): ?>
    <?php
    $this->widget('zii.widgets.CBreadcrumbs', array(
        'links' => $this->breadcrumbs,
    ));
    ?><!-- breadcrumbs -->
        <?php endif ?>
       <?php echo $content; ?>
       <div class="clear"></div>
       <div id="footer">
           Copyright &copy; <?php echo date('Y'); ?> Casas Da Praia.<br/>
            All Rights Reserved.<br/>
       </div><!-- footer -->
       </div><!-- page -->
   </body>
    <script>
       $('#mainmenu ul li').button();
        $('.himenu').click(function(){
            $('.accountBox').toggle();
        });
    </script>

</html>
