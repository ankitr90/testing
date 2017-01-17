<?php
require "vendor/predis/predis/autoload.php";

Predis\Autoloader::register();

// since we connect to default setting localhost
// and 6379 port there is no need for extra
// configuration. If not then you can specify the
// scheme, host and port to connect as an array
// to the constructor.
try {
    $single_server = array(
        'scheme' => 'tcp',
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'password'=> 'Redis@123',
    );

    $client = new Predis\Client($single_server, array('prefix' => 'PHPREDIS_SESSION:'));

    $handler = new Predis\Session\Handler($client);
    $handler->register();

    //$client->set('foo', 'bar');
    //$value = $client->get('foo');
    //echo $value;
    echo '<br>'."Successfully connected to Redis";
}
catch (Exception $e)
{
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}