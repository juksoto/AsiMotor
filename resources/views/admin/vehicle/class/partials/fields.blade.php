<section id="wrapper-make">
    <section class="form-group has-feedback" id="field_template_0">
        {!! Form::label('vehicle_class',trans('admin.vehicle.vehicle_class'), ['class' => 'col-sm-1 control-label'] ) !!}
        <div class="col-sm-10">
            {!! Form::text('vehicle_class', null, ['class' => 'form-control', 'placeholder' => trans('admin.vehicle.vehicle_class') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="vehicle_class1"></span>
        </div>
    </section>
</section>
