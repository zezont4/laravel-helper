<?php
$create_page = "
\$router->model('".strtolower($edited_table_name)."_id', 'App\\".$edited_table_name."');
\$router->bind('".strtolower($edited_table_name)."_id_wt', function (\$value) {
	return \\App\\".$edited_table_name."::withTrashed()->findOrFail(\$value);
});
";
?>
<div class="clearfix col-xs-12">
	<hr>
	<?php //$filePath = $outputDir . $edited_table_name . "RouteServiceProvider"; ?>
	<h3>
		<span class="pull-left">RouteServiceProvider</span>
		<span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('RouteServiceProvider_code'))" unselectable="on">تحديد الكود</button></span>
	</h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="RouteServiceProvider_code">
			<?php
			echo escape($create_page);
			//			writeToFile($filePath, $create_page);
			?>
		</code>
	</pre>
</div>