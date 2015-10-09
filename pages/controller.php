<?php
$field_names = '"' . implode('","', $checked_fields) . '"';

$create_page = "
	public function __construct()
    {
        //\$this->middleware('auth');
		//\$this->middleware('acl');
    }

    public function search()
    {
        return View('" . strtolower($edited_table_name) . ".search');
    }

	public function index(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ")

    {
		// DB::row is used to fix order by full_name
        //\$" . strtolower($edited_table_name) . "s = \$" . strtolower($edited_table_name) . "->search()->sort()->select('*', \DB::raw('CONCAT_WS(\" \", name1, name2, name3, name4) AS full_name'))->paginate();

		\$" . strtolower($edited_table_name) . "s = \$" . strtolower($edited_table_name) . "->search()->sort()->paginate();

        \$trashed" . $edited_table_name . "s = \$" . strtolower($edited_table_name) . "->search()->onlyTrashed()->latest()->get();

        return View('" . strtolower($edited_table_name) . ".index', compact('" . strtolower($edited_table_name) . "s', 'trashed" . $edited_table_name . "s'));
    }

    public function create()
    {
        return View('" . strtolower($edited_table_name) . ".create');
    }

    public function store(\\App\\Http\\Requests\\" . $edited_table_name . "Request \$request)
    {
        $" . strtolower($edited_table_name) . " = " . $edited_table_name . "::create(\$request->all());

        return redirect()->route('" . strtolower($edited_table_name) . ".show', ['" . strtolower($edited_table_name) . "_id'=> $" . strtolower($edited_table_name) . "->id]);
    }

    public function show(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ")

    {
        return View('" . strtolower($edited_table_name) . ".show', compact('" . strtolower($edited_table_name) . "'));
    }

    public function edit(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ")
    {
        return View('" . strtolower($edited_table_name) . ".edit', compact('" . strtolower($edited_table_name) . "'));
    }

    public function update(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ", \\App\\Http\\Requests\\" . $edited_table_name . "Request \$request)
    {
        \$" . strtolower($edited_table_name) . "->update(\$request->all());

        return redirect()->back();
    }


    public function destroy(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ")
    {
        \$" . strtolower($edited_table_name) . "->delete();

        return redirect()->back();
    }

    public function restore(\\App\\" . $edited_table_name . " \$" . strtolower($edited_table_name) . ")
    {
        \$" . strtolower($edited_table_name) . "->restore();

        return redirect()->back();
    }";
?>
<div class="clearfix col-xs-12">
    <hr>
    <h3>
        <span class="pull-left">controller</span>
        <span>
            <button class="btn btn-success"
                    onclick="selectElementContents(document.getElementById('controller_code'))"
                    unselectable="on"> تحديد
                الكود
            </button>
        </span>
    </h3>
	<pre class="language-php" data-language="language-php" style="direction: ltr">
		<code class="language-php" id="controller_code">
            <?php
            echo escape($create_page);
            ?>
        </code>
	</pre>
</div>