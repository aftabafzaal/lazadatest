<?php

$config = [    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => false,
        ],
        'response' => [
        'format' => yii\web\Response::FORMAT_JSON,
        'charset' => 'UTF-8',
        // ...
        ]
    ],];

if (!YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
//    $config['bootstrap'][] = 'debug';
//    $config['modules']['debug'] = 'yii\debug\Module';
}

return $config;
