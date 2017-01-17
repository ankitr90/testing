<?php
/**
 * Created by PhpStorm.
 * User: ankitr
 * Date: 12/1/16
 * Time: 2:13 PM
 */
require_once 'redis.php';
session_start();
session_destroy();

header('location:/');