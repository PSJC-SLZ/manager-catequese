<div class="row">
    <div class="form-group col-md-12 @if ($errors->has('nome')) has-error @endif">
        {!! Form::label('nome', 'Descrição*', ['class' => 'control-label']) !!}
        <div class="controls">
            {!! Form::text('nome', old('nome'), ['class' => 'form-control','maxlength' => '60']) !!}
            @if ($errors->has('nome')) <p class="help-block">{{ $errors->first('nome') }}</p> @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-12">
        {!! Form::submit('Salvar dados', ['class' => 'btn btn-success pull-right']) !!}
    </div>
</div>
