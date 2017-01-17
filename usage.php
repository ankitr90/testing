<?php
$redis = new Predis\Client;
$handler = new RedisSession($redis);
session_set_save_handler($handler);
session_start();
// Use the $_SESSION superglobal as normal
$_SESSION['Ankit'] = 'Rana';

$count = isset($_SESSION['count']) ? $_SESSION['count'] : 0;

$_SESSION['count'] = ++$count;

echo '<br>'.$_SESSION['count'];

