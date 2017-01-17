<?php
/**
 * Created by PhpStorm.
 * User: ankitr
 * Date: 19/5/16
 * Time: 2:08 PM
 */
echo 'hello';
$date1=date_create("2013-2-1");
$date2=date_create("2013-2-2");
$diff=date_diff($date1,$date2);
print_r($diff);
echo $diff->format("%R%a days");


echo $diff->invert;

$date="02-20-2000";
$date=date_create("2013-03-15");
echo date_format($date,"m-d-Y");


$date="mm-dd-yyyy";

$dateA=explode('-',$date);
$dateN=$dateA[1].'-'.$dateA[0].'-'.$dateA[2];
echo $dateN;