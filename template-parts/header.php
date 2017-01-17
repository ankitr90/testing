<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Testing</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/handlebars/handlebars.min.js"></script>

</head>

<body id="page-top" class="index">

<!-- Navigation -->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Testing</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="redis-test.php">Redis</a>
                </li>
                <li class="page-scroll">
                    <a href="sparkpost-test.php">Spark Post</a>
                </li>

                <li class="page-scroll">
                    <a href="bugSnag.php">BugSnag</a>
                </li>
                <li class="page-scroll">
                    <a href="upload.php">Upload</a>
                </li>
                <li class="page-scroll">
                    <a href="handlebars.php">Handlebars</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container">
    <h2><?php echo  (!empty($pageTitle)) ? $pageTitle : 'Testing'; ?></h2>
    <hr class="star-primary">