<?php

namespace app;

use Collective\Html\FormFacade as Form;

class MyForm
{

	public $yes_no = [
		1 => 'Yes نعم',
		0 => 'No لا'
	];

	public $colWidth = [
		2  => 'col-sm-6 col-md-2',
		3  => 'col-xs-12 col-sm-6 col-md-3',
		4  => 'col-sm-6 col-md-4',
		6  => 'col-sm-12 col-md-6',
		12 => 'col-xs-12'
	];


	public $errors = null;
	public $width = 3;

	public function addForm_controlClass(Array $attr = null)
	{
		if ($attr) {
			if (array_key_exists('class', $attr)) {
				$attr['class'] .= ' form-control';
			} else {
				$attr += ['class' => 'form-control'];
			}
		} else {
			$attr['class'] = 'form-control';
		}

		return $attr;
	}

	public function formText(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('text', $options, $formElementAttr);
	}

	public function formSelect(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('select', $options, $formElementAttr);
	}

	public function formDate(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('date', $options, $formElementAttr);
	}

	public function formRadio(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('radio', $options, $formElementAttr);
	}

	public function formCheck(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('check', $options, $formElementAttr);
	}

	public function formButton(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('button', $options, $formElementAttr);
	}

	public function formStatic(Array $options, Array $formElementAttr = null)
	{
		$this->generateFormElement('static', $options, $formElementAttr);
	}

	public function generateFormElement($type, Array $options, Array $formElementAttr = null)
	{

		$inputWidth = 12 - $this->width;

		$error_class = '';

		if ($this->errors && isset($options['name'])) {
			$error_class = $this->errors->has($options['name']) ? 'has-error' : '';
		}

		$formElementAttr = $this->addForm_controlClass($formElementAttr);

		echo "<div class='form-group {$error_class}'>";

		if (isset($options['label']) && $type != 'button') {

			echo Form::label($options['name'], $options['label'], ['class' => 'control-label col-sm-' . $this->width]);
			echo "<div class='col-sm-{$inputWidth}'>";

		} else {

			echo "<div class='col-sm-offset-{$this->width} col-sm-{$inputWidth}'>";

		}

		if ($type == 'text') {

			echo Form::text($options['name'], null, $formElementAttr);

		} else if ($type == 'date') { ?>

			<div class='input-group date' id='<?php echo $options['name']; ?>id'>
				<span class='input-group-addon'><i class='fa fa-lg fa-calendar'></i></span>
				<?php echo Form::text($options['name'], null, $formElementAttr); ?>
			</div>

			<script type="text/javascript">
				$(function () {
					$("#<?php echo $options["name"];?>id").datetimepicker({
						icons: {
							time: "fa fa-clock-o",
							date: "fa fa-calendar",
							up: "fa fa-arrow-up",
							down: "fa fa-arrow-down"
						},
						format: "YYYY-MM-DD HH:mm:ss"
					});
				});
			</script>

			<?php
		} else if ($type == 'radio') { ?>

			<div class='row'>
				<div class='col-xs-12 btn-group' data-toggle='buttons'>
					<?php $radioWidth = 100 / count($options['values']);
					foreach ($options['values'] as $key => $val) { ?>
						<label class='btn btn-default' style='width: <?php echo $radioWidth; ?>%'>
							<?php $attr['id'] = $options['name'] . $key;
							echo Form::radio($options['name'], $key, null, $attr);
							echo $val; ?>
						</label>
					<?php } ?>
				</div>
			</div>

			<?php
		} else if ($type == 'check') { ?>

			<div class='row'>
				<div class='col-xs-12 btn-group' data-toggle='buttons'>
					<?php $radioWidth = 100 / count($options['values']);
					foreach ($options['values'] as $key => $val) { ?>
						<label class='btn btn-default' style='width: <?php echo $radioWidth; ?>%'>
							<?php $attr['id'] = str_replace('[]','',$options['name']) . $key;
							echo Form::checkbox($options['name'], $key, null, $attr);
							echo $val; ?>
						</label>
					<?php } ?>
				</div>
			</div>

			<?php
		} else if ($type == 'select') {

			echo Form::select($options['name'], $options['values'], null, $formElementAttr);

		} else if ($type == 'button') {

			echo Form::submit($options['label'], ['class' => 'btn material_button btn-' . $options['class']]);

		} else if ($type == 'static') { ?>

			<p class="form-control-static"><?php echo $options['value']; ?></p>

		<?php }

		echo "</div>";
		//echo $errors->first($name, '<span class="help-block">:message</span>');

		echo "</div>";

	}

}