<?php include_once($StartDir . 'functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon.ico">
    <link href="<?php echo Config::get('root_dir'); ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/bootstrap-rtl.min.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/prism.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/droidarabicnaskh.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/ge_ss_two_light.css" rel="stylesheet">
    <link href="<?php echo Config::get('root_dir'); ?>css/style.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo Config::get('root_dir'); ?>js/jquery.min.js"></script>

</head>

<body>
<div class="container material_container">
    <div class="text-center" style="background-color: #008CBA;color: #fff; padding: 10px; margin-bottom: 10px">
        <a href="<?php echo Config::get('root_dir'); ?>index.php">
            <span style="color: #f1f1f1;font-size: 24px;" class="glyphicon glyphicon-home pull-right"></span>
        </a>

        <span style="font-size: 18px;"><?php echo $pageTitle; ?></span>
    </div>
    <div class="container-fluid">