<?php
include_once('functions.php');
if (isset($_POST['create_edit'])) {
	$checked_fields = [];
	$elements_type = [];
	$field_is_required = [];
	foreach ($_POST['field_name'] as $field_name) {
		$checked_fields[] = $field_name;
		$elements_type['type_' . $field_name] = $_POST['type_' . $field_name];
		$field_is_required['field_is_required_' . $field_name] = (isset($_POST['field_is_required_' . $field_name]) ? 'required' : '');
	}
	$_SESSION['checked_fields'] = $checked_fields;
	$_SESSION['elements_type'] = $elements_type;
	$_SESSION['field_is_required'] = $field_is_required;
	//    var_dump($checked_fields);
	header('Location:make_create_edit_page.php');
} elseif (isset($_POST['view'])) {
	echo 'view';
}