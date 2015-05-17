<?php

include 'app.php';

session_cache_limiter(false);
session_start();

date_default_timezone_set('Europe/Paris');


if (!defined('PROD'))
    define('PROD', (!empty($_SERVER['SERVER_NAME']) && strpos($_SERVER['SERVER_NAME'], APP_SERVER) !== false));
error_reporting(PROD ? 0 : E_ALL);




define('HOST', $app->request()->getUrl());
define('CURRENT', $app->request()->getPath());

$app->hook('slim.before.dispatch', function() use ($app) {
    $app->view()->setData('app', $app);
});
