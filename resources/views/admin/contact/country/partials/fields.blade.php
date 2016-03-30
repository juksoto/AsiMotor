    <div class="form-group has-feedback ">
        {!! Form::label('country',trans('admin.country.name_country'), ['class' => 'col-sm-2 control-label'] ) !!}
        <div class="col-sm-10">
           {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => trans('admin.country.enter_a_name_country') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="country1"></span>
        </div>
    </div>
    <div class="form-group has-feedback">
        {!! Form::label('iso',trans('admin.country.iso_country'), ['class' => 'col-sm-2 control-label'] ) !!}
        <div class="col-sm-10">
            {!! Form::text('iso', null, ['class' => 'form-control', 'placeholder' => trans('admin.country.enter_a_iso_country') , 'required']) !!}
            <span class="glyphicon form-control-feedback" id="iso1"></span>
        </div>
    </div>
