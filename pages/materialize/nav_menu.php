<?php
$create_page = "
<!-- Dropdown Structure -->
<ul id='dropdown1' class='dropdown-content'>
    <li><a href='{{route(\"" . strtolower($edited_table_name) . ".index\")}}'>" . $arabic_label . "</a></li>
    <li><a href='{{route(\"" . strtolower($edited_table_name) . ".create\")}}'>جديد</a></li>
    <li><a href='{{route(\"" . strtolower($edited_table_name) . ".search\")}}'>بحث</a></li>
</ul>
	<!-- Dropdown Trigger -->
  <li><a class='dropdown-button' href='#!' data-activates='dropdown1'>" . $arabic_label . "<i class='material-icons right'>arrow_drop_down</i></a></li>
	"; ?>
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