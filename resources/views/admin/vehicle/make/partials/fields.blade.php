<section id="wrapper-make">
    <section class="form-group has-feedback" id="field_template_0">
        {!! Form::label('vehicle_make',trans('admin.vehicle.vehicle_make'), ['class' => 'col-sm-1 control-label'] ) !!}
        <div class="col-sm-10">
            {!! Form::text('vehicle_make', null, ['class' => 'form-control', 'placeholder' => trans('admin.vehicle.vehicle_make') , 'required'])  !!}
            <span class="glyphicon form-control-feedback" id="vehicle_make1"></span>
        </div>
    </section>
</section>
