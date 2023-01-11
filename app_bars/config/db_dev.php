<?
//Параметры подключения к БД разработка
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=madamecori',
            'username' => 'root',
            'password' => 'root',
            'charset' => 'utf8',
            'tablePrefix' => '',
            'enableSchemaCache' => true,
        ]
    ]
];
