<?php $danger = ['danger', 'danger01', 'danger02', 'danger03', 'danger04', 'danger05', 'danger99'];?>
<?php $warning = ['warning', 'warning01', 'warning02', 'warning03', 'warning04', 'warning05', 'warning99'];?>
<?php $success = ['success', 'success01', 'success02', 'success03', 'success04', 'success05', 'success99'];?>
<?php $info = ['info', 'info01', 'info02', 'info03', 'info04', 'info05', 'info99'];?>
<?php $msgs = array_merge($danger, $warning, $success, $info);?>

@foreach ($msgs as $msg)
    @if(Session::has($msg))
        <div class="alert alert-{{ preg_replace('/\d+/','',$msg) }}" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get($msg) }}
        </div>
    @endif
@endforeach

{{--رسائل الخطأ--}}
@if(count($errors->all()))
    <div>
        @foreach($errors->all() as  $error)
            <div class="col-lg-6">
                <div class="msg msg-danger">{!!$error!!}</div>
            </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <hr>
@endif