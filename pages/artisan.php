<?php
$create_page = "
php artisan make:model " . $edited_table_name . "
php artisan make:controller " . $edited_table_name . "Controller  --plain
php artisan make:request " . $edited_table_name . "Request
composer dump-autoload";
?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">artisan</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('artisan_code'))"
                      unselectable="on">تحديد الكود
            </button></span>
    </h3>
	<pre class="language-artisan" data-language="language-artisan" style="direction: ltr">
		<code class="language-artisan" id="artisan_code">
            <?php
            echo escape($create_page);
            ?>
        </code>
	</pre>
</div>