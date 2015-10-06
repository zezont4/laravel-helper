<?php
$create_page = "
/*" . $edited_table_name . " routes*/

/* Show */
Route::get('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id}/show', ['as' => '" . strtolower($edited_table_name) . ".show', 'uses' => '" . $edited_table_name . "Controller@show', 'permission' => '" . strtolower($edited_table_name) . "-show']);
/* Search */
Route::get('search/" . strtolower($edited_table_name) . "', ['as' => '" . strtolower($edited_table_name) . ".search', 'uses' => '" . $edited_table_name . "Controller@search',  'permission' => '" . strtolower($edited_table_name) . "-search']);
Route::get('" . strtolower($edited_table_name) . "s', ['as' => '" . strtolower($edited_table_name) . ".index', 'uses' => '" . $edited_table_name . "Controller@index', 'permission' => '" . strtolower($edited_table_name) . "-index']);
/* Edit */
//wt = With Trashed
Route::get('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/edit', ['as' => '" . strtolower($edited_table_name) . ".edit', 'uses' => '" . $edited_table_name . "Controller@edit', 'permission' => '" . strtolower($edited_table_name) . "-edit']);
Route::put('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/update', ['as' => '" . strtolower($edited_table_name) . ".update', 'uses' => '" . $edited_table_name . "Controller@update', 'permission' => '" . strtolower($edited_table_name) . "-edit']);
/* Create */
Route::get('" . strtolower($edited_table_name) . "/create', ['as' => '" . strtolower($edited_table_name) . ".create', 'uses' => '" . $edited_table_name . "Controller@create', 'permission' => '" . strtolower($edited_table_name) . "-create']);
Route::post('" . strtolower($edited_table_name) . "', ['as' => '" . strtolower($edited_table_name) . ".store', 'uses' => '" . $edited_table_name . "Controller@store', 'permission' => '" . strtolower($edited_table_name) . "-create']);
/* Delete */
Route::DELETE('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id}', ['as' => '" . strtolower($edited_table_name) . ".destroy', 'uses' => '" . $edited_table_name . "Controller@destroy', 'permission' => '" . strtolower($edited_table_name) . "-destroy']);
Route::post('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/restore', ['as' => '" . strtolower($edited_table_name) . ".restore', 'uses' => '" . $edited_table_name . "Controller@restore', 'permission' => '" . strtolower($edited_table_name) . "-restore']);
/************************************************/";
?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">route</span>
        <span><button class="btn btn-success" onclick="selectElementContents(document.getElementById('route_code'))"
                      unselectable="on">تحديد الكود
            </button></span>
    </h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="route_code">
            <?php
            echo escape($create_page);
            ?>
        </code>
	</pre>
</div>