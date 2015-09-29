<?php

if (!function_exists("generate_field_block")) {
    function generate_field_block($element_type, $field_info, $is_required, $html_vals = false) {
        $block = '';
        switch ($element_type) {
            /* ######## TEXT ##########*/
            case 'text':
                $block = "
            <div class='form-group'>
               <label class='control-label col-sm-2' for='{$field_info[0]}'>{$field_info[8]}</label>
                <div class='col-sm-10'>";
            $block .= "
                    <input type = 'text' class='form-control' name = '{$field_info[0]}' id = '{$field_info[0]}' placeholder = '{$field_info[8]}' value = '<?php echo \${$field_info[0]}; ?>' {$is_required}>
            </div>
            </div>
            ";
                break;

            /* ######## SELECT ##########*/
            case 'select':
                $block = "
                <div class='form-group'>
                   <label class='control-label col-sm-2' for='{$field_info[0]}'>{$field_info[8]}</label>
                    <div class='col-sm-10'>
                        <select class='form-control' name='{$field_info[0]}'  id='{$field_info[0]}'>";
                $block .= "
                    <?php
                     // \$optionVals = queryToArray('select id,name from users order by username');
                     \$optionVals=[
                             '1' => 'option1',
                             '2' => 'option2'
                            ];
                     foreach(\$optionVals as \$key => \$val){
                     ?>
                        <option value=\"<?php echo \$key;?>\"><?php echo \$val ;?></option>
                     <?php } ?>
                    ";
                $block .= "
                    </select>
                    </div>
                </div>";
                break;

            /* ######## CHECKBOX ##########*/
            case 'checkbox':
                $block = "
                <div class='form-group'>
                   <label class='control-label col-sm-2' for='{$field_info[0]}'>{$field_info[8]}</label>
                   <div class='col-sm-10'>";
                $block .= "
                    <?php
                     // \$checkVals = queryToArray('select id,name from users order by username');
                     \$checkVals=[
                             '1' => 'check1',
                             '2' => 'check2'
                            ];
                     foreach(\$checkVals as \$key => \$val){
                     ?>
                        <label class='checkbox-inline'>
                        <input type='checkbox' name='{$field_info[0]}' id=\"{$field_info[0]}_<?php echo \$key;?>\" value=\"<?php echo \$key;?>\"> &nbsp;<?php echo \$val ;?>
                        </label>
                     <?php } ?>
                    ";
                $block .= "
                    </div>
                </div>";
                break;

            /* ######## RADIO ##########*/
            case 'radio':
                $block = "
                <div class='form-group'>
                   <label class='control-label col-sm-2' for='{$field_info[0]}'>{$field_info[8]}</label>
                    <div class='col-sm-10'>";
                $block .= "
                    <?php
                     // \$radioVals = queryToArray('select id,name from users order by username');
                     \$radioVals=[
                             '1' => 'radio1',
                             '2' => 'radio2'
                            ];
                     foreach(\$radioVals as \$key => \$val){
                     ?>
                        <label class='radio-inline'>
                        <input type='radio' name='{$field_info[0]}' id=\"{$field_info[0]}_<?php echo \$key;?>\" value=\"<?php echo \$key;?>\"> &nbsp;<?php echo \$val ;?>
                        </label>
                     <?php } ?>
                    ";
                $block .= "
                    </div>
                </div>";
                break;

        }

        return $block;
    }
}