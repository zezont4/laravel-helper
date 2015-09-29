<?php
include_once($StartDir . 'functions.php');
//$settings = parse_ini_file("settings.ini.php");
//$root = Config::get('root_dir');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="<?php echo Config::get('root_dir'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/prism.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/alertify.core.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/alertify.default.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/droidarabicnaskh.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/ge_ss_two_light.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/parsley.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo Config::get('root_dir'); ?>js/jquery.min.js"></script>


</head>

<body>
<div class="container material_container">
    <div class="text-center" style="height: 80px;background-color: #008CBA;color: #fff; font-size: 32px; padding: 20px">
        <a href="<?php echo Config::get('root_dir'); ?>index.php"><span style="color: #f1f1f1" class="glyphicon glyphicon-home pull-right"></span></a>

        <p><?php echo $pageTitle; ?></p>
    </div>
    <div class="container-fluid">
        <br>