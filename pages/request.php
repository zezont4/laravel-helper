<?php
$field_names="";
foreach ($field_is_required as $field_name => $is_required) {
	if($is_required) {
		$field_names .= "'".str_replace('field_is_required_','',$field_name)."' => 'required', \n\t";
	}
}
$create_page = "
public function rules() {
	\$dateFormat = 'Y-m-d H:i:s';

	//\$".strtolower($edited_table_name)."_id = @\$this->".strtolower($edited_table_name)."_id_wt->id or '';

	return [
	/*'mobile_no' => 'required|unique:".strtolower($edited_table_name)."s,mobile_no,' . \$".strtolower($edited_table_name)."_id,*/
	/*'delivered_at'  => 'required_if:is_delivered,1|date_format:{\$dateFormat}|after:fixed_at',*/
	$field_names
	];
}
";
?>
<div class="clearfix col-xs-12">
	<hr>
	<?php $filePath = $outputDir . $table_name . "model.php"; ?>
	<h3>
		<span class="pull-left">request.php</span>
		<span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('request_code'))" unselectable="on">تحديد الكود</button></span>
		<!--		<span><a class="btn btn-success" href="--><?php //echo $filePath; ?><!--" target="_blank">معاينة الصفحة</a></span>-->
	</h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="request_code">
			<?php
			echo escape($create_page);
			//			writeToFile($filePath, $create_page);
			?>
		</code>
	</pre>
</div>