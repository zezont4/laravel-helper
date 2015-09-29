<!--<div class="content relative">-->
<div class="col-sm-4">
    <img class="img_403" src="<?php echo $root; ?>img/image-403.png"/>
</div>
<?php saveCurrentUrl();

$logIn = new Login(); ?>
<br><br><br><br>
<div class="col-sm-8">
    <?Php
    if ($logIn->isLoggedIn() == true) {
        ?>
        <h3>
            <span class="text-danger h1">عفوا...</span>
            <span>لا تمتلك صلاحيات</span>
        </h3>

        <h3>
            <span>هذه الصفحة (<span class="text-primary"><?php echo $pageTitle; ?></span>خاصة بالمسؤول العام فقط</span>
        </h3>
    <?php
    } else {
        //	Redirect::to($StartDir.'login.php');
        ?>
    <h3>
        <span class="text-danger h1">فضلا...</span>
        <span ><a href="<?php echo $root; ?>login.php" target="_self">قم بتسجيل الدخول</a></span>
    </h3>

    <?php
    }
    ?>
</div>
<?php include_once(trim($StartDir) . 'templates/footer.php'); ?>
