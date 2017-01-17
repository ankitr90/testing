<?php

require_once 'vendor/autoload.php';
ini_set('display_errors',0);
error_reporting(E_COMPILE_ERROR | E_WARNING);
$bugsnag = Bugsnag\Client::make('785d95fef1840c084e67b7be460237dd');


Bugsnag\Handler::register($bugsnag);


require_once('hello.php');

echo $test;
