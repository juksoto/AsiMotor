    <div class="form-group has-feedback ">
        {!! Form::label('city',trans('admin.city.name_city'), ['class' => 'col-sm-2 control-label'] ) !!}
        <div class="col-sm-10">
           {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('admin.city.enter_a_name_city') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="city1"></span>
        </div>
    </div>
    <div class="form-group has-feedback">
        {!! Form::label('country_id', trans('admin.country.select_a_country') ,  ['class' => 'col-sm-2 control-label'] ) !!}
        <div class="col-sm-10">
            <select class="form-control" name="country_id" id="country_id" required >
                <option value="">{{ trans('admin.country.select_a_country') }}</option>
                @foreach($data -> country as $country)
                    <option value="{!! $country -> id!!}" @if (Route::is('admin.city.edit')) @if( $data -> collection -> country_id == $country -> id ) selected @endif @endif > {!! $country -> country !!} </option>
                @endforeach
            </select>
            <span class="glyphicon form-control-feedback" id="iso1"></span>
        </div>
    </div>
