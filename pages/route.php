<?php
$create_page = "
/*" . $edited_table_name . " routes*/

/* Show */
Route::get('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id}/show', ['as' => '" . strtolower($edited_table_name) . ".show', 'uses' => '" . $edited_table_name . "Controller@show', 'middleware' => 'acl:show-" . strtolower($edited_table_name) . "']);
/* Search */
Route::get('search/" . strtolower($edited_table_name) . "', ['as' => '" . strtolower($edited_table_name) . ".search', 'uses' => '" . $edited_table_name . "Controller@search',  'middleware' => 'acl:search-" . strtolower($edited_table_name) . "']);
Route::get('" . strtolower($edited_table_name) . "s', ['as' => '" . strtolower($edited_table_name) . ".index', 'uses' => '" . $edited_table_name . "Controller@index', 'middleware' => 'acl:view-" . strtolower($edited_table_name) . "-index']);
/* Edit */
//wt = With Trashed
Route::get('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/edit', ['as' => '" . strtolower($edited_table_name) . ".edit', 'uses' => '" . $edited_table_name . "Controller@edit', 'middleware' => 'acl:edit-" . strtolower($edited_table_name) . "']);
Route::put('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/update', ['as' => '" . strtolower($edited_table_name) . ".update', 'uses' => '" . $edited_table_name . "Controller@update', 'middleware' => 'acl:edit-" . strtolower($edited_table_name) . "']);
/* Create */
Route::get('" . strtolower($edited_table_name) . "/create', ['as' => '" . strtolower($edited_table_name) . ".create', 'uses' => '" . $edited_table_name . "Controller@create', 'middleware' => 'acl:create-" . strtolower($edited_table_name) . "']);
Route::post('" . strtolower($edited_table_name) . "', ['as' => '" . strtolower($edited_table_name) . ".store', 'uses' => '" . $edited_table_name . "Controller@store', 'middleware' => 'acl:create-" . strtolower($edited_table_name) . "']);
/* Delete */
Route::DELETE('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id}', ['as' => '" . strtolower($edited_table_name) . ".destroy', 'uses' => '" . $edited_table_name . "Controller@destroy', 'middleware' => 'acl:destroy-" . strtolower($edited_table_name) . "']);
Route::post('" . strtolower($edited_table_name) . "/{" . strtolower($edited_table_name) . "_id_wt}/restore', ['as' => '" . strtolower($edited_table_name) . ".restore', 'uses' => '" . $edited_table_name . "Controller@restore', 'middleware' => 'acl:restore-" . strtolower($edited_table_name) . "']);
/************************************************/";
?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">route</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('route_code'))"
                    unselectable="on">تحديد الكود
            </button>
        </span>
    </h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="route_code">
            <?php
            echo escape($create_page);
            ?>
        </code>
	</pre>
</div>