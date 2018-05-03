<div class="form-group">
    {{ Form::label('Rating', null, ['class' => 'control-label col-sm-2']) }}
    <div class="col-sm-10">
        <div class="rating-container">
            <label class="radio-inline rating">
                <input type="radio" name="{{$name}}" value="1"> 1
            </label>
            <label class="radio-inline rating">
                <input type="radio" name="{{$name}}" value="2"> 2
            </label>
            <label class="radio-inline rating">
                <input type="radio" name="{{$name}}" value="3"> 3
            </label>
            <label class="radio-inline rating">
                <input type="radio" name="{{$name}}" value="4"> 4
            </label>
            <label class="radio-inline rating">
                <input type="radio" name="{{$name}}" value="5"> 5
            </label>
        </div>
    </div>
</div>
