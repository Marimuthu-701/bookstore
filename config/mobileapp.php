<?php

$apiConfig = [];

$devBaseUrl  = env('APP_URL') . '/mobileapi/';
$liveBaseUrl = env('APP_URL') . '/mobileapi/';


//API base URLs
$apiConfig['site_url'] = env('APP_URL');
$apiConfig['base_url'] = array(
    'development' => $devBaseUrl,
    'production'  => $liveBaseUrl,
);

$apiVersion = 'v1/';

$apiConfig['api_list'] = array(
    'login' => [
        'development' => 'login',
        'production'  => 'login',
    ],
    'register' => [
        'development' => 'register',
        'production'  => 'register',
    ],
    'logout' => [
        'development' => $apiVersion . 'logout',
        'production'  => $apiVersion . 'logout',
    ]
);

return [
    'app_config' => $apiConfig,
];
