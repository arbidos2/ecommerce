<?php
/**
 * Created by PhpStorm.
 * User: pl
 * Date: 5/4/15
 * Time: 11:49
 */


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php ?></title>
    <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/bootstrap/dist/css/bootstrap.css">
    <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=base_url()?>dashboard">Dashboard</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Orders <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Products</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Logoff</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</body>
</html>