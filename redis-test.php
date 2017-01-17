<?php

require_once ('inc/inc.php');

//Default vars

$pageTitle = 'Redis Test';

?>

<?php require_once('template-parts/header.php'); ?>
<?php
//simple counter to test sessions. should increment on each page reload.

require_once 'redis.php';
session_start();

$count = isset($_SESSION['count']) ? $_SESSION['count'] : 0;

$_SESSION['count'] = ++$count;

echo '<br>'.$_SESSION['count'];

//echo phpinfo();
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/

?>
<h3>
    <a href="destroy.php">Destroy Session</a>
</h3>
<?php require_once('template-parts/footer.php'); ?>

