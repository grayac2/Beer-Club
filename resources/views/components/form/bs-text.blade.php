<div class="form-group">
    {{ Form::label($name, null, ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text(str_slug($name), $value, ['class' => 'form-control']) }}
        @if ($errors->has(str_slug($name)))
            <span class="label label-danger">Error: {{$errors->first(str_slug($name))}}</span>
        @endif
    </div>
</div>