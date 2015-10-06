<?php
$create_page = "
ALTER TABLE " . $table_name . "  ADD deleted_at TIMESTAMP NULL DEFAULT NULL;
ALTER TABLE " . $table_name . "  ADD created_at TIMESTAMP NOT NULL;
ALTER TABLE " . $table_name . "  ADD updated_at TIMESTAMP NOT NULL;";
?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">SQL</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('SQL_code'))"
                      unselectable="on">تحديد الكود
            </button></span>
    </h3>
	<pre class="language-sql" data-language="language-sql" style="direction: ltr">
		<code class="language-sql" id="SQL_code">
            <?php
            echo escape($create_page);
            ?>
        </code>
	</pre>
</div>