<section id="wrapper-make">
    <section class="form-group has-feedback" id="field_template_0">
        {!! Form::label('vehicle_line',trans('admin.vehicle.vehicle_line'), ['class' => 'col-sm-1 control-label'] ) !!}
        <div class="col-sm-10">
            {!! Form::text('vehicle_line', null, ['class' => 'form-control', 'placeholder' => trans('admin.vehicle.vehicle_line') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="vehicle_line1"></span>
        </div>
    </section>
</section>
