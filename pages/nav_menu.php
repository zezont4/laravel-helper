<?php
$create_page = "
<li class='dropdown'>
	<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'>" . $edited_table_name . "<span class='caret'></span></a>
	<ul class='dropdown-menu' role='menu'>
		<li class='{{ifActive('" . strtolower($edited_table_name) . ".index')}}'><a href='{{route('" . strtolower($edited_table_name) . ".index')}}'>" . $edited_table_name . "s</a></li>
		<li class='{{ifActive('" . strtolower($edited_table_name) . ".create')}}'><a href='{{route('" . strtolower($edited_table_name) . ".create')}}'>جديد</a></li>
		<li class='{{ifActive('" . strtolower($edited_table_name) . ".search')}}'><a href='{{route('" . strtolower($edited_table_name) . ".search')}}'>بحث</a></li>
	</ul>
</li>"; ?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">Navigation Menu</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('nav_menu'))"
                    unselectable="on">تحديد الكود
            </button>
        </span>
    </h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="nav_menu">
            <?php echo escape($create_page); ?>
        </code>
	</pre>
</div>