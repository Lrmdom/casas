<?php

return array(
    'sourcePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'messagePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'messages',
    'languages' => array('en', 'de', 'pt', 'es', 'fr'), // according to your translation needs
    'fileTypes' => array('php'),
    'overwrite' => TRUE,
    'removeOld' => FALSE,
    'sort' => true,
    'exclude' => array(
        '.svn',
        '.gitignore',
        'yiilite.php',
        'yiit.php',
        '/i18n/data',
        '/messages',
        '/vendors',
        '.',
        '/web/js',
        'UserModule.php', // if you are using yii-user ...
    ),
);
?>
