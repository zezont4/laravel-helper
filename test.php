<?php
include 'functions.php';
$pdo = new PDO("mysql:dbname=quranzulfiold;host=" . Config::get('host'), Config::get('user'), Config::get('pass'), [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

$pagination = new Zebra_Pagination();
$records_per_page = 10;
$limit = (($pagination->get_page() - 1) * $records_per_page);

$whereSQL = 'where StName2="أحمد"';
$result = $pdo->query("select * FROM view_0_students {$whereSQL} LIMIT {$limit},$records_per_page");
$resultAll = $pdo->query("select count(*) FROM view_0_students {$whereSQL}");

$rows = $resultAll->fetchColumn();

$pagination->records($rows);
$pagination->records_per_page($records_per_page);
?>
    <html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link href="css/bootstrap-rtl.min.css" rel="stylesheet">
    </head>
    <body>
    <table class="table table-bordered" border="1">
        <tr>
            <th>Country</th>
        </tr>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['StID'] ?></td>
            </tr>
        <?php } ?>
    </table>
    </body>
    </html>
<?php $pagination->render(); ?>

<div>
    <ul class="pagination">
        <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    </ul>
</div>