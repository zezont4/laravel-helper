<?php
$field_names='\''.implode('\', \'',$checked_fields).'\'';

$create_page = "
use SoftDeletes;
use Traits\\SearchFormHelper;
use Traits\\FlashMessageAfterSaving;

protected \$table = '".$_SESSION['table_name']."';

protected \$fillable = [".$field_names."];

/*
 * my custom searchable fields that came from search form
 */
public \$searchableFields = [".$field_names."];
";
?>
<div class="clearfix col-xs-12">
	<hr>
	<?php $filePath = $outputDir . $table_name . "model.php"; ?>
	<h3>
		<span class="pull-left">model.php</span>
		<span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('model_code'))" unselectable="on">تحديد الكود</button></span>
<!--		<span><a class="btn btn-success" href="--><?php //echo $filePath; ?><!--" target="_blank">معاينة الصفحة</a></span>-->
	</h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="model_code">
			<?php
			echo escape($create_page);
//			writeToFile($filePath, $create_page);
			?>
		</code>
	</pre>
</div>