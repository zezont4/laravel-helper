
@inject('myForm','App\MyForm()')

<?php $myForm->errors = $errors;?>

{!! $myForm->formText(['label' => 'رقم الجوال', 'name' => 'mobile_no']) !!}

{!! $myForm->formText(['label' => 'الاسم', 'name' => 'name1']) !!}

{!! $myForm->formText(['label' => 'الأب', 'name' => 'name2']) !!}

{!! $myForm->formText(['label' => 'الجد', 'name' => 'name3']) !!}

{!! $myForm->formText(['label' => 'العائلة', 'name' => 'name4']) !!}

{!! $myForm->formText(['label' => 'ملاحظات', 'name' => 'notes']) !!}


<hr>

{!! $myForm->formButton(['label' => $btnLabel, 'class' => 'primary']) !!}
