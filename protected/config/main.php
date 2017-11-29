<?php

Yii::setPathOfAlias('chartjs', dirname(__FILE__) . '/../extensions/yii-chartjs');
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Casas da praia , arrendamento e venda de imóveis e casas de férias',
    'theme' => 'v1',
    'timezone' => 'Europe/Lisbon',
    'language' => 'pt',
    // preloading 'log' component
    'preload' => array('log', 'chartjs'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.grid.ButtonColumnExt',
        'application.extensions.mail.Email',
        'application.ext.xupload.XUploadWidget',
        'application.extensions.phpmailer.EMailer',
        'application.extensions.jtogglecolumn.JToggleColumn',
    ),
    'modules' => array(
        
    ),
    // application components
    'components' => array(
       'cache' => array(
            'class' => 'CDbCache',
       ),
        'chartjs' => array('class' => 'chartjs.components.ChartJs'),
        'widgetFactory' => array(
            'widgets' => array(
                'CLinkPager' => array(
                    //'cssFile' => (strlen(dirname($_SERVER['SCRIPT_NAME'])) > 1 ? dirname($_SERVER['SCRIPT_NAME']) : '' ) . '/css/bootstrap.css',
                ),
            ),
        ),
        'db_i18n' => array(
            'class' => 'CDbMessageSource',
            'connectionID' => 'db',
            'sourceMessageTable' => 'SourceMessage',
            'translatedMessageTable' => 'Message',
        //'cachingDuration' => (YII_DEBUG ? 0 : 360),
        ),
        'file_i18n' => array(
            'class' => 'CPhpMessageSource',
        //'cachingDuration' => (YII_DEBUG ? 0 : 3600),
        ),
        'commandMap' => array(
            'cron' => 'application.extensions.PHPDocCrontab'
        ),
        'session' => array(
            'autoStart' => true,
        ),
        'YiiConditionalValidator' => array(
            'class' => 'application.extensions.YiiConditionalValidator',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => TRUE,
        ),
        'simpleImage' => array(
            'class' => 'application.extensions.simpleimage.CSimpleImage',
        ),
        'mailer' => array(
            'class' => 'application.extensions.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        // 'email' => array(
        //    'class' => 'application.extensions.email.Email',
        //   'delivery' => 'debug',
        //'delivery' => 'php'
        //Will use the php mailing function.
        //May also be set to 'debug' to instead dump the contents of the email into the view
        //),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            //'showScriptName' => false,
            //'caseSensitive' => false,
            'rules' => array(
                'gii' => 'gii',
                'gii/<controller:\w+>' => 'gii/<controller>',
                'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>/<slug:>.html' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
            ),
        ),
        //  'db'=>array(
        // 	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
        // ),
        // uncomment the following to use a MySQL database
       'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=casas',
            'emulatePrepare' => true,
            //'username' => 'casasdap_admin',
            //'password' => 'kraft2012',
'username' => 'root',
'password' => 'root',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
            'schemaCachingDuration' => 9600
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, trace',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(

       	'domain' => gethostname(),
        'adminEmail' => 'admin@casasdapraia.pt',
        'siteEmail' => 'geral@casasdapraia.pt',
        'noReplyEmail' => 'webmaster@casasdapraia.pt',
        "phone" => "+351 281956272 ",
"mobile" => "+351 966684564",
        'analyticsKey' => 'UA-37138261-1',
        'mapsKey' => 'AIzaSyCpjOF55hC2_pb4iA46kkjUWySYwtRCiso',
        'ga_email' => 'lmatiasdomingos@gmail.com',
        'ga_password' => '7bj8_GOO',
        'ga_profile_id' => '67214090',
'watermarkImg' => 'css/images/casasdapraia2.png',
        //check fbUsirID http://graph.facebook.com/username
        'fbUserId' => "100004925709150",
        'fbAppId' => '790150834333514',
        'fbAppSecret' => '20e682450ed4318abd3f390d1c4ed6a3',
        "fbAppPublishPage" => "casasda.praia",
        'fbPath' => 'https://www.facebook.com/casasda.praia',
        'twitterPath' => 'http://twitter.com/casasdapraia1',
        'linkeinPath' => 'https://www.linkedin.com/pub/casasdapraia-imoexcel-media%C3%A7%C3%A3o-imobili%C3%A1ria/62/726/777',
        'gplusPath' => '',
        'calendarID' => 'f7s3kcquhsd4ku7icuof2ipu9o@group.calendar.google.com'


    ),
);
