<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			// uncomment the following to provide test database connection
                   
		   'db'=>array( 
           'connectionString'=>'sqlsrv:server=localhost\sqlexpress;database=RentalCasa',
           'username'=>'sa',
            'password'=>'qwerty00',
                'charset' => 'utf8',
                'class' => 'CDbConnection'
        ),
                   
		),
	)
);
