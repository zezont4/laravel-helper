<?php
$pageTitle = 'حدد قاعدة البيانات';
$StartDir = '';
include_once($StartDir . 'templates/header.php');

$pdo = new PDO("mysql:host=" . Config::get('host'), Config::get('user'), Config::get('pass'));
$dbs = $pdo->query('SHOW DATABASES')->fetchAll();
?>
    <ul class="nav nav-pills nav-stacked -nav-tabs-justified text-left">
        <?php
        $sys_db = ['performance_schema', 'mysql', 'information_schema'];
        foreach ($dbs as $db) {
            if (!in_array($db['Database'], $sys_db)) {
                echo "<li><a href='tables.php?db_name={$db['Database']}'>{$db['Database']}</a></li>";
            }
        }
        ?>
    </ul>
<?php include_once($StartDir . 'templates/footer.php');
