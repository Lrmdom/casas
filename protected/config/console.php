<?php

$_SERVER['SERVER_NAME'] = 'casasdapraia.com';
$_SERVER['HTTP_HOST'] = 'casasdapraia.com';
// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Arrendamentos , vendas e casas de férias',
    'timezone' => 'Europe/Lisbon',
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.extensions.mail.Email',
        'application.ext.xupload.XUploadWidget',
        'application.extensions.EMailerConsole',
    ),
    // application components
    'components' => array(
        'commandMap' => array(
            'cron' => 'application.extensions.PHPDocCrontab'
        ),
        'mailer' => array(
            'class' => 'application.extensions.EMailerConsole',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        'db' => array(
            'connectionString' => 'mysql:host=mysql;dbname=casasdap_casas',
            //'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'class' => 'CDbConnection',
            'schemaCachingDuration' => 9600
        ),
    // uncomment the following to use a MySQL database
    /*
      'db'=>array(
      'connectionString' => 'mysql:host=localhost;dbname=testdrive',
      'emulatePrepare' => true,
      'username' => 'root',
      'password' => '',
      'charset' => 'utf8',
      ),
     */
    ),
    'params' => array(
        // this is used in contact page
        'domain' => gethostname(),
        'adminEmail' => 'admin@casasdapraia.pt',
        'siteEmail' => 'geral@casasdapraia.pt',
        'noReplyEmail' => 'webmaster@casasdapraia.pt',
        "phone" => "1111111111",
        'analyticsKey' => 'UA-37138261-1',
        'mapsKey' => 'AIzaSyCpjOF55hC2_pb4iA46kkjUWySYwtRCiso',
        'ga_email' => 'lmatiasdomingos@gmail.com',
        'ga_password' => '7bj8_GOO',
        'ga_profile_id' => '67214090',
        'watermarkImg' => 'css/images/logo.png',
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
