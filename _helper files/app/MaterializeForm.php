<?php

namespace app;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Request;

class MaterializeForm
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

    function ifActive($routeName, $active = 'active')
    {
        $url = route($routeName);
        return Request::url() == $url ? $active : '';
    }

    public function addForm_controlClass(Array $attr = null)
    {
        if ($attr) {
            if (array_key_exists('class', $attr)) {
                $attr['class'] .= ' input-field';
            } else {
                $attr += ['class' => 'input-field'];
            }
        } else {
            $attr['class'] = 'input-field';
        }

        return $attr;
    }

    public function formText(Array $options, Array $formElementAttr = null)
    {
        $this->generateFormElement('text', $options, $formElementAttr);
    }

    public function generateFormElement($type, Array $options, Array $formElementAttr = null)
    {

        $inputWidth = (12 - $this->width);

        $attr_and_id = isset($options['name']) ? ['id' => $options['name']] : [];
        if ($formElementAttr) {
            array_merge($attr_and_id, $formElementAttr);
        }

        $error_class = '';

        if ($this->errors && isset($options['name'])) {
            $error_class = $this->errors->has($options['name']) ? 'invalid' : '';
        }

        //$formElementAttr = $this->addForm_controlClass($formElementAttr);


        $input_field = "<div class='input-field col s12 {$error_class}'>";

        $label = '';
        if (isset($options['label']) && $type != 'button') {
            $label = Form::label($options['name'], $options['label'], ['data-error' => "\$errors->first(\$name)"]);
        }

        if ($type == 'text') {
            echo $input_field;
            if (isset($options['zezo_date'])) {

                echo '<i class="material-icons">event</i>';
                echo Form::text($options['name'], null, array_merge($attr_and_id, ['zezo_date' => 'true']));
                echo $label;

            } else {

                echo Form::text($options['name'], null, $attr_and_id);
                echo $label;
            }
            echo '</div>';

        } else if ($type == 'date') { ?>

            <div class='input-group date' id='<?php echo $options['name']; ?>id'>
                <span class='input-group-addon'><i class='fa fa-lg fa-calendar'></i></span>
                <?php echo Form::text($options['name'], null, $attr_and_id); ?>
            </div>
            <?php echo $label; ?>
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
            <div class='radio_rapper col s12'>
                <p class="title-font">
                    <?php echo $options['label']; ?>
                </p>
                <?php
                foreach ($options['values'] as $key => $val) {
                    $attr['id'] = $options['name'] . $key; ?>
                    <p>
                        <?php echo Form::radio($options['name'], $key, null, $attr); ?>
                        <label for="<?php echo $attr['id']; ?>">
                            <?php echo $val; ?>
                        </label>
                    </p>
                <?php }
                ?>
                <div class="divider"></div>
            </div>
            <?php
        } else if ($type == 'check') { ?>
            <div class='radio_rapper col s12'>
                <p class="title-font">
                    <?php echo $options['label']; ?>
                </p>
                <?php
                foreach ($options['values'] as $key => $val) {
                    $attr['id'] = str_replace('[]', '', $options['name']) . $key; ?>
                    <p>
                        <?php echo Form::checkbox($options['name'], $key, null, $attr); ?>
                        <label for="<?php echo $attr['id']; ?>">
                            <?php echo $val; ?>
                        </label>
                    </p>
                <?php }
                ?>
                <div class="divider"></div>
            </div>
            <?php
        } else if ($type == 'select') {
            echo $input_field;
            echo Form::select($options['name'], $options['values'], null, $attr_and_id);
            echo $label;
            echo '</div>';

        } else if ($type == 'button') {

            echo '<button class="waves-effect ' . $options['class'] . '" type="submit" name="action">' . $options['label'] . '</button>';
//            echo Form::submit($options['label'], ['class' => 'waves-effect ' . $options['class']]);

        } else if ($type == 'static') { ?>
            <div class="row">
                <p class="col s4"><?php echo $options['label']; ?></p>

                <p class="col s8"><?php echo $options['value']; ?></p>
            </div>
        <?php }

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

}